<?php
class Feedbacks
  /**
    * Get all feedbacks
    *
    * return array {@type Feedback}
    */
{
    public function index()
    {
       return Feedback::all();
    }
}