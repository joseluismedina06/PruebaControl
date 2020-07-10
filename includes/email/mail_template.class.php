<?php
class mail_template
{
    public function mail_header()
    {
        return '<div style="width:100%;margin-bottom:14px;padding-top:12px;padding-bottom:12px;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;background-color: #337ab7"><center><img style="text-align:center" src="http://fotos.subefotos.com/577e7000f5b79bbd62d6b7a5cac61c08o.png" title=""/></center></div>';
    }
    public function mail_footer()
    {
    	global $words;
        $year = date("Y");
        $copyright = "Italcambio";
        $footer = <<<FOOTER
        <div style='width:100%;background-color:#161616;color:#7D7C62;padding-top:15px;padding-bottom:15px;margin-top:14px'><center>$copyright - $year</center></div>
FOOTER;
        return $footer;
    }
}
?>