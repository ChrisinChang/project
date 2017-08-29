<?php

class Code{

	//資源
	private $img;
	//圖片寬度
	private $width=125;
	//圖片高度
	private $height=35;
	//背景顏色
	private $bgColor='#ffffff';
	//驗證碼
	private $code;
	//驗證碼的隨機種子
	private $codeStr='23456789abcdefghjkmnpqrstuvwsyz';
	//驗證碼長度
	private $codeLen= 3;
	//驗證碼字體
	private $font;
	//驗證碼字體大小
	private $fontSize=18;
	//驗證碼字體顏色
	private $fontColor='';

	public function __construct() {
	}

	//創建驗證碼
	public function make()
	{
		if(empty($this->font))
		{
			 $this->font = __DIR__.'/consola.ttf';
		}
		$this->create();//生成驗證碼
		header("Content-type:image/png");
		imagepng($this->img);
		imagedestroy($this->img);
		exit;
	}

	//設定字體
	public function font($font)
	{
		$this->font= $font;
		return $this;
	}

	//設定文字大小
	public function fontSize($fontSize)
	{
		$this->fontSize=$fontSize;
		return $this;
	}

	//設定字體顏色
	public function fontColor($fontColor)
	{
		$this->fontColor = $fontColor;
		return $this;
	}

	//設定驗證碼數量
	public function num($num)
	{
		$this->codeLen=$num;
		return $this;
	}

	//設定寬度
	public function width($width)
	{
		$this->width = $width;
		return $this;
	}

	//設定高度
	public function height($height)
	{
		$this->height = $height;
		return $this;
	}

	//設定背景顏色
	public function background($color)
	{
		$this->bgColor = $color;
		return $this;
	}

	//返回驗證碼
	public function get() {
		return $_SESSION['code'];
	}

	//生成驗證碼
	private function createCode() {
		$code = '';
		for ($i = 0; $i < $this->codeLen; $i++) {
			$code .= $this->codeStr [mt_rand(0, strlen($this->codeStr) - 1)];
		}
		$this->code = strtoupper($code);
		$_SESSION['code'] = $this->code;
	}

	//建立驗證碼圖
	private function create() {
		if (!$this->checkGD())
			return false;
		$w = $this->width;
		$h = $this->height;
		$bgColor = $this->bgColor;
		$img = imagecreatetruecolor($w, $h);
		$bgColor = imagecolorallocate($img, hexdec(substr($bgColor, 1, 2)), hexdec(substr($bgColor, 3, 2)), hexdec(substr($bgColor, 5, 2)));
		imagefill($img, 0, 0, $bgColor);
		$this->img = $img;
		$this->createLine();
		$this->createFont();
//		$this->createPix();
		$this->createRec();
	}

	//畫方格線
	private function createLine(){
		$w = $this->width;
		$h = $this->height;
		$line_color = "#dcdcdc";
		$color = imagecolorallocate($this->img, hexdec(substr($line_color, 1, 2)), hexdec(substr($line_color, 3, 2)), hexdec(substr($line_color, 5, 2)));
		$l = $h/5;
		for($i=1;$i<$l;$i++){
			$step =$i*5;
			imageline($this->img, 0, $step, $w,$step, $color);
		}
		$l= $w/10;
		for($i=1;$i<$l;$i++){
			$step =$i*10;
			imageline($this->img, $step, 0, $step,$h, $color);
		}
	}

	//畫矩形邊框
	private function createRec() {
		imagerectangle($this->img, 0, 0, $this->width - 1, $this->height - 1, $this->fontColor);
	}

	//寫入驗證碼文字
	private function createFont() {
		$this->createCode();
		$color = $this->fontColor;
		if (!empty($color)) {
			$fontColor = imagecolorallocate($this->img, hexdec(substr($color, 1, 2)), hexdec(substr($color, 3, 2)), hexdec(substr($color, 5, 2)));
		}
		$x = ($this->width - 10) / $this->codeLen;
		for ($i = 0; $i < $this->codeLen; $i++) {
			if (empty($color)) {
				$fontColor = imagecolorallocate($this->img, mt_rand(50, 155), mt_rand(50, 155), mt_rand(50, 155));
			}
			imagettftext($this->img, $this->fontSize, rand(-20, 20), $x * $i + mt_rand(6, 10), $this->height -10, $fontColor, $this->font, $this->code [$i]);
		}
		$this->fontColor = $fontColor;
	}

	//畫內線
	private function createPix() {
		$pix_color = $this->fontColor;
		for ($i = 0; $i < 50; $i++) {
			imagesetpixel($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), $pix_color);
		}

		for ($i = 0; $i < 2; $i++) {
			imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height), $pix_color);
		}
		//畫圓弧
		for ($i = 0; $i < 1; $i++) {
			// 設定畫線寬度
			imagearc($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height)
				, mt_rand(0, 160), mt_rand(0, 200), $pix_color);
		}
		imagesetthickness($this->img, 1);
	}

	//驗證GD庫
	private function checkGD() {
		return extension_loaded('gd') && function_exists("imagepng");
	}

}