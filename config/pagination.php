<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//config for bootstrap pagination class integration
/*
<ul class="pagination pull-right">
  <li class="footable-page-arrow disabled"><a href="#first" data-page="first">«</a></li>
  <li class="footable-page-arrow disabled"><a href="#prev" data-page="prev">‹</a></li>
  <li class="footable-page active"><a href="#" data-page="0">1</a></li>
  <li class="footable-page"><a href="#" data-page="1">2</a></li>
  <li class="footable-page-arrow"><a href="#next" data-page="next">›</a></li>
   <li class="footable-page-arrow"><a href="#last" data-page="last">»</a></li>
</ul>
*/
$config['full_tag_open'] = '<ul class="pagination pull-right">';
$config['full_tag_close'] = '</ul>';
$config['first_link'] = 'First';
$config['first_tag_open'] = '<li class="footable-page">';
$config['first_tag_close'] = '</li>';
$config['prev_link'] = '&laquo';
$config['prev_tag_open'] = '<li class="prev">';
$config['prev_tag_close'] = '</li>';
$config['next_link'] = '&raquo';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="footable-page active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';


