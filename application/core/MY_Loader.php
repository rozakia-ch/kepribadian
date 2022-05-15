<?php
class MY_Loader extends CI_Loader
{


  function  __construct()
  {
    parent::__construct();
    $CI = &get_instance();
    $CI->load = $this;
  }

  public function ext_view($view, $vars = array(), $return = FALSE)
  {

    $_ci_ext = pathinfo($view, PATHINFO_EXTENSION);
    $view = ($_ci_ext == '') ? $view . '.php' : $view;

    return $this->_ci_load(
      array(
        '_ci_view' => $view,
        '_ci_vars' => $this->_ci_prepare_view_vars($vars),
        '_ci_return' => $return
      )
    );
  }
}
