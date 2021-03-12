<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statistik_model extends CI_Model
{
    function pencairanBulan()
    {
        $q = $this->db->query("SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', SUM(IF(month = 'Feb', total, 0)) AS 'Feb', SUM(IF(month = 'Mar', total, 0)) AS 'Mar', SUM(IF(month = 'Apr', total, 0)) AS 'Apr', SUM(IF(month = 'May', total, 0)) AS 'May', SUM(IF(month = 'Jun', total, 0)) AS 'Jun', SUM(IF(month = 'Jul', total, 0)) AS 'Jul', SUM(IF(month = 'Aug', total, 0)) AS 'Aug', SUM(IF(month = 'Sep', total, 0)) AS 'Sep', SUM(IF(month = 'Oct', total, 0)) AS 'Oct', SUM(IF(month = 'Nov', total, 0)) AS 'Nov', SUM(IF(month = 'Dec', total, 0)) AS 'Dec' FROM ( SELECT DATE_FORMAT(tgl_pencairan, '%b') AS month, SUM(total) as total FROM tbl_pencairan WHERE tgl_pencairan <= NOW() and tgl_pencairan >= Date_add(Now(),interval - 12 month) GROUP BY DATE_FORMAT(tgl_pencairan, '%m-%Y')) as sub");
        return $q->row_array();
    }
}
