<?php 

class Home_Model extends CI_Model {
    
    public function select_all_project_with_text_limit()
    {
        $sql = "SELECT project_id, project_name, project_image, SUBSTRING(`project_summery`, 1, 210) AS project_summery FROM tbl_project";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_news_with_text_limit()
    {
        $sql = "SELECT news_id, news_title, news_image_0, news_image_1, news_image_2, news_image_3, news_image_4, SUBSTRING(`news`, 1, 210) AS news FROM tbl_news";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
}