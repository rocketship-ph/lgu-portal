<?php @session_start();?>
<?php
class SessionHook{
    var $CI;

    function __construct(){
        $this->CI =& get_instance();
    }

    public function execute()
    {
        // if($this->CI->uri->segment(1)!='homepage' ){
        //     if($this->CI->uri->segment(1)!='announcements' ){
        //         if (!$this->CI->session->isUserLoggedIn) {
        //             redirect(base_url() . 'homepage');
        //         }
        //     }

        // }
        if($this->CI->uri->segment(1)!='homepage' && $this->CI->uri->segment(1)!='reportgenerationmanagement'){
            if($this->CI->uri->segment(1)!='announcements' && $this->CI->uri->segment(1)!='employeelist'){
                if (!$this->CI->session->isUserLoggedIn) {
                    redirect(base_url() . 'homepage');
                }
            }

        }
    }
}
?>