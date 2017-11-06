<?php
class Download
{
	public $fetch;
	public $title;	
	public $author;	
	public $duration;	
	public $views;	
	public $vtu;
	
	public function __construct($link)
	{
		parse_str($link,$url);
		$id=array_values($url)[0];
		$this->fetch="http://www.youtube.com/get_video_info?&video_id=" . $id . "&asv=3&el=detailpage&hl=en_US";;
		$this->vtu = "http://i1.ytimg.com/vi/{$id}/hqdefault.jpg";
	}
	
	public function get()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->fetch);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$process = curl_exec($ch);
		curl_close($ch);
		return $process;
	}
	public function primary($title,$author,$duration,$views)
	{
		$this->title=$title;
		$this->author=$author;
		$this->duration=$duration." seconds";
		$this->views=$views;
		
	}
	function parseStream($stream)
{
    $available_formats = [];
    foreach ($stream as $format) {
        parse_str($format, $format_info);
        if (isset($format_info['bitrate'])) $quality = isset($format_info['quality_label'])?$format_info['quality_label']:round($format_info['bitrate']/1000). 'k';
        else $quality = isset($format_info['quality'])?$format_info['quality']:'';

        switch ($quality) {
            case 'hd720':
                $quality = "720p";
                break;
            case 'medium':
                $quality = "360p";
                break;
            case 'small':
                $quality = "240p"; // May Less
                break;
        }
        $type = explode(";", $format_info['type']);
        $type= $type[0];
        switch ($type) {
            case 'video/3gpp':
                $type = "3GP";
                break;
            case 'video/mp4':
                $type = "MP4";
                break;
             case 'video/webm':
                $type = "WebM";
                break;
        }
        $available_formats[] = [
            'itag' =>  $format_info['itag'],
            'quality' => $quality,
            'type' => $type,
            'url' => $format_info['url'],
            'size' => $this::getSize($format_info['url']),

        ];
    }
   
    return $available_formats;
}
	private static function getSize($url)
		
		{

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_NOBODY, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$r = curl_exec($ch);

    foreach (explode("\n", $r) as $header) {
        if (strpos($header, 'Content-Length:') === 0) {
            return intval(intval(trim(substr($header, 16)))/ (1024*1024)) . " MB";
        }
    }
}   
}







	
	
