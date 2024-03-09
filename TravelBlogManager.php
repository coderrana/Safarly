<?php
class TravelBlogManager {
    private $travelBlogs = [];

    public function addTravelBlog(TravelBlog $blog) {
        $this->travelBlogs[] = $blog;
    }

    public function getTravelBlogs() {
        return $this->travelBlogs;
    }
}