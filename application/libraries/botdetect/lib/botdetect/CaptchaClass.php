<?php
class Captcha{

	public function __construct($_O960dwnlzlx80kan71j4u){
		$this->_19rfbwwg52f4hw0m = $_O960dwnlzlx80kan71j4u;
		$this->_Ifqvq0mx3ishpcl4shpwi = "\x42\x44\x43\137\126\x43\111\x44\x5f{$_O960dwnlzlx80kan71j4u}";
		$this->_l7rrhgxvpea3wuw0455ezv23a1 = "{$_O960dwnlzlx80kan71j4u}\137\103\141\x70\164\143\x68\141\111\155\141\x67\x65";
		$this->_0ple7kvdfw5gc1rdm1bve = new BDC_CaptchaBase($_O960dwnlzlx80kan71j4u);
		$this->_i675vg6w17myfvnq7z3fb = $this->_0ple7kvdfw5gc1rdm1bve->CaptchaId;
		$this->_0qfom03diklb4loflosqmpvlx8 = $this->_0ple7kvdfw5gc1rdm1bve->Settings;
		$this->_lgy89ehjf8iphq6glkpcx5zwqy = $this->_0qfom03diklb4loflosqmpvlx8->ImageTooltip;
		$this->_o7d00750i8l8qxndefz08 = $this->_0qfom03diklb4loflosqmpvlx8->SoundTooltip;
		$this->_imw4maimy64e9h6e4t4m1 = $this->_0qfom03diklb4loflosqmpvlx8->ReloadTooltip;
		$this->_lp6vw63qw0jhv7hir44v65lmg7 = $this->_0qfom03diklb4loflosqmpvlx8->HelpLinkText;
		$this->_Ovs4x64ru9w7buxcjznn0 = $this->_0qfom03diklb4loflosqmpvlx8->HelpLinkUrl;
		$this->_Ipx959qhm5s3v4cuqaflg = $this->_0qfom03diklb4loflosqmpvlx8->ReloadEnabled;
		$this->_0t5kmvmiqsqq4ks3 = $this->_0qfom03diklb4loflosqmpvlx8->UseSmallIcons;
		$this->_1h27ygoztf38duozl6nu5 = $this->_0qfom03diklb4loflosqmpvlx8->UseHorizontalIcons;
		$this->_Icos2nahf7pse7so80htusfo2c = $this->_0qfom03diklb4loflosqmpvlx8->SoundIconUrl;
		$this->_i405ofm36knk9sv8vc3nvkqt1a = $this->_0qfom03diklb4loflosqmpvlx8->ReloadIconUrl;
		$this->_Onya2s7kzkeaucl0vfeh8wtgaw = $this->_0qfom03diklb4loflosqmpvlx8->IconsDivWidth;
		$this->m_TabIndexStart = - 255;
		$this->_Iexcv9pzqzstrxhuvi37l4mzv1 = $this->_0qfom03diklb4loflosqmpvlx8->AdditionalCssClasses;
		$this->_1zf1vqcpds0l7e48h4d2u4b7u9 = $this->_0qfom03diklb4loflosqmpvlx8->AdditionalInlineCss;
		$this->_Iqz5savvtki9yk19 = $this->_0qfom03diklb4loflosqmpvlx8->AddScriptInclude;
		$this->_oinmkngh4k06ozekza3dcuff70 = $this->_0qfom03diklb4loflosqmpvlx8->AddInitScript;
		$this->_Otq1pld8jfskd79i = $this->_0qfom03diklb4loflosqmpvlx8->AutoFocusInput;
		$this->_1bvikzxqoe422fj4h9gjvn8uie = $this->_0qfom03diklb4loflosqmpvlx8->AutoClearInput;
		$this->_Oj1zixycz8umcv1h = $this->_0qfom03diklb4loflosqmpvlx8->AutoUppercaseInput;
		$this->_l76jsos757yngvxix0by8 = $this->_0qfom03diklb4loflosqmpvlx8->AutoReloadExpiredCaptchas;
		$this->_1b210kqqlpqygfhjo9bfqzf9z5 = $this->_0qfom03diklb4loflosqmpvlx8->AutoReloadTimeout;
		$this->_or98wt7vm5qerzp02rpsku8kqv = $this->_0qfom03diklb4loflosqmpvlx8->SoundStartDelay;
		$this->_193z0boeed7agxa525fb4 = $this->_0qfom03diklb4loflosqmpvlx8->RemoteScriptEnabled;
		$this->Load();
	}

	private $_0qfom03diklb4loflosqmpvlx8 = null;
	private $_0ple7kvdfw5gc1rdm1bve;
	public function get_CaptchaBase(){
		return $this->_0ple7kvdfw5gc1rdm1bve;
	}

	private $_19rfbwwg52f4hw0m;
	private $_i675vg6w17myfvnq7z3fb;
	private $_oh2qwpd2igyc0kn0tl2k4;
	public function get_UserInputID(){
		return $this->_oh2qwpd2igyc0kn0tl2k4;
	}

	public function set_UserInputID($_i6cvgnzrfyveslszv1eqf){
		if (is_string($_i6cvgnzrfyveslszv1eqf))
			{
			$this->_oh2qwpd2igyc0kn0tl2k4 = "$_i6cvgnzrfyveslszv1eqf";
			}
	}

	private $_Ifqvq0mx3ishpcl4shpwi;
	protected function get_HiddenFieldId()
	{
		return $this->_Ifqvq0mx3ishpcl4shpwi;
	}

	private $_lgy89ehjf8iphq6glkpcx5zwqy;
	public function get_ImageTooltip(){
		if (BDC_StringHelper::HasValue($this->_lgy89ehjf8iphq6glkpcx5zwqy)){
			return $this->_lgy89ehjf8iphq6glkpcx5zwqy;
		}else{
			return $this->Localization->ImageTooltip;
	  	}
	}

	public function set_ImageTooltip($_Iewnl3j47mi3ss97wflrl){
		if (is_string($_Iewnl3j47mi3ss97wflrl))
			{
			$this->_lgy89ehjf8iphq6glkpcx5zwqy = $_Iewnl3j47mi3ss97wflrl;
			}
	}

	private $_o7d00750i8l8qxndefz08;
	public function get_SoundTooltip(){
		if ($this->SoundPackageMissing && $this->_0qfom03diklb4loflosqmpvlx8->WarnAboutMissingSoundPackages)
			{
			return "\74\x65\x6d\76\103\141\160\x74\143\150\141\x20\163\x6f\x75\x6e\144\40\151\163\x20\145\x6e\x61\142\x6c\145\x64\x2c\40\142\x75\164\40\x74\150\145\x20\160\162\157\156\165\x6e\x63\151\x61\x74\151\157\x6e\x20\163\157\165\x6e\144\x20\x70\141\143\153\141\147\145\40\162\145\161\165\x69\x72\145\x64\x20\x66\x6f\162\x20\x74\150\x65\x20\143\165\162\162\x65\x6e\164\x20\x6c\x6f\143\141\x6c\145\x20\x63\141\x6e\40\x6e\157\x74\x20\x62\145\40\146\157\165\156\144\x2e\x3c\57\x65\x6d\76\40\n\x3c\145\x6d\x3e\x54\157\x20\145\x6e\x61\x62\x6c\145\40\103\141\x70\x74\143\150\141\40\163\157\x75\x6e\x64\x20\x66\x6f\x72\x20\164\150\151\163\40\x6c\x6f\x63\x61\154\x65\x2c\40\x70\154\x65\141\163\x65\40\x64\x65\x70\x6c\x6f\171\x20\164\x68\x65\40\x61\160\x70\x72\x6f\160\162\x69\x61\x74\145\x20\163\x6f\x75\156\x64\x20\x70\141\x63\153\x61\147\145\x20\x74\x6f\40\164\x68\x65\x20\74\143\x6f\x64\145\76\\l\x69\x62\\b\x6f\x74\144\x65\x74\145\x63\x74\\R\145\163\x6f\x75\x72\x63\x65\163\\S\x6f\165\x6e\x64\x73\\<\x2f\143\x6f\x64\145\76\40\146\157\x6c\x64\145\162\x20\157\146\40\164\150\145\40\102\x6f\x74\104\x65\x74\x65\143\x74\40\x50\110\120\40\x43\x61\x70\x74\x63\x68\x61\40\154\x69\142\162\141\162\x79\x2e\x20\x46\x6f\162\x20\x65\x78\x61\x6d\x70\154\x65\54\40\x75\x73\x65\x20\74\143\x6f\144\145\76\120\162\157\x6e\x75\156\143\x69\x61\164\151\x6f\156\x5f\x45\156\x67\154\x69\x73\150\x5f\107\102\x2e\142\x64\163\x70\74\57\x63\x6f\x64\145\x3e\x20\146\157\x72\40\102\162\151\164\151\x73\x68\x20\105\156\x67\x6c\151\x73\x68\40\x43\x61\160\164\x63\x68\x61\x20\x73\x6f\x75\x6e\x64\163\56\x3c\57\145\x6d\76\x20\n\74\145\155\x3e\124\x6f\40\x64\x69\x73\x61\x62\154\x65\40\164\x68\x69\x73\x20\167\x61\x72\x6e\x69\x6e\x67\40\x61\x6e\x64\40\162\145\x6d\x6f\166\145\40\164\150\x65\40\x73\x6f\x75\x6e\x64\40\x69\143\157\x6e\x20\146\157\x72\x20\164\x68\x65\40\x63\165\162\x72\145\x6e\164\40\103\141\160\164\x63\x68\141\x20\154\x6f\143\x61\154\x65\54\x20\163\145\x74\40\74\143\157\144\x65\x3e\$\102\x6f\164\104\145\x74\145\x63\x74\x2d\x3e\127\x61\x72\x6e\x41\142\157\x75\164\x4d\151\x73\x73\151\156\147\123\x6f\165\156\144\120\x61\x63\x6b\141\x67\145\x73\x20\75\x20\x66\x61\x6c\x73\145\x3b\74\57\x63\x6f\x64\145\76\40\151\x6e\x20\x74\x68\x65\40\74\x63\157\x64\145\76\103\x61\x70\164\143\150\141\103\x6f\x6e\x66\151\147\56\160\x68\160\74\57\x63\157\x64\145\x3e\x20\x66\151\x6c\x65\x2e\40\x54\x6f\x20\162\145\x6d\x6f\x76\145\x20\164\x68\x65\x20\163\157\165\156\144\x20\x69\x63\x6f\x6e\40\146\x6f\x72\40\141\154\x6c\x20\154\x6f\143\x61\154\x65\163\54\40\x73\151\x6d\x70\154\171\x20\163\x65\x74\x20\74\143\157\x64\x65\76\$\102\x6f\x74\x44\145\x74\x65\143\x74\x2d\x3e\123\157\x75\156\144\105\156\141\142\154\145\x64\40\75\40\146\x61\x6c\163\145\73\x3c\57\143\x6f\x64\145\x3e\x2e\x3c\x2f\x65\155\x3e";
			}

		if (BDC_StringHelper::HasValue($this->_o7d00750i8l8qxndefz08))
			{
			return $this->_o7d00750i8l8qxndefz08;
			}
		  else
			{
			return $this->Localization->SoundTooltip;
			}
	}

	public

	function set_SoundTooltip($_lfict0zirwrxe040tr7bjw2re0){
		if (is_string($_lfict0zirwrxe040tr7bjw2re0))
			{
			$this->_o7d00750i8l8qxndefz08 = $_lfict0zirwrxe040tr7bjw2re0;
			}
	}

	public function get_CaptchaSoundAvailable(){
		return $this->_0ple7kvdfw5gc1rdm1bve->IsLocalizedPronunciationAvailable;
	}

	public function get_SoundPackageMissing(){
		return ($this->SoundEnabled && !$this->CaptchaSoundAvailable);
	}

	private $_imw4maimy64e9h6e4t4m1;
	public function get_ReloadTooltip(){
		if (BDC_StringHelper::HasValue($this->_imw4maimy64e9h6e4t4m1))
			{
			return $this->_imw4maimy64e9h6e4t4m1;
			}
		  else
			{
			return $this->Localization->ReloadTooltip;
			}
	}

	public function set_ReloadTooltip($_Oh3l7nfoxbwe7m4n6lzrah4zgp)
	{
		if (is_string($_Oh3l7nfoxbwe7m4n6lzrah4zgp)){
			$this->_imw4maimy64e9h6e4t4m1 = $_Oh3l7nfoxbwe7m4n6lzrah4zgp;
		}
	}

	private $_lp6vw63qw0jhv7hir44v65lmg7;
	public function get_HelpLinkText(){
		/*if (BDC_StringHelper::HasValue($this->_lp6vw63qw0jhv7hir44v65lmg7)){
			return BDC_HelpLinkHelper::GetHelpLinkText($this->_lp6vw63qw0jhv7hir44v65lmg7, $this->ImageWidth);
		}else
		{
			return BDC_HelpLinkHelper::GetDefaultText($this->ImageWidth);
		}*/
	}

	public function set_HelpLinkText($_Ojx8j7q9dbis93arjfj4h2ymwp){
		/*if (is_string($_Ojx8j7q9dbis93arjfj4h2ymwp)){
			$this->_lp6vw63qw0jhv7hir44v65lmg7 = $_Ojx8j7q9dbis93arjfj4h2ymwp;
		}*/
	}

	private $_Ovs4x64ru9w7buxcjznn0;
	public function get_HelpLinkUrl(){
		/*if (BDC_StringHelper::HasValue($this->_Ovs4x64ru9w7buxcjznn0)){
			return BDC_HelpLinkHelper::GetHelpLinkUrl($this->_Ovs4x64ru9w7buxcjznn0, $this->Localization);
		}else{
			return BDC_HelpLinkHelper::GetDefaultUrl($this->Localization);
		}*/
	}

	public function set_HelpLinkUrl($_01athsgagmj1071qhh85a){
		/*if (is_string($_01athsgagmj1071qhh85a)){
			$this->_Ovs4x64ru9w7buxcjznn0 = $_01athsgagmj1071qhh85a;
		}*/
	}

	private $_Ipx959qhm5s3v4cuqaflg;
	public function get_ReloadEnabled(){
		return $this->_Ipx959qhm5s3v4cuqaflg;
	}

	public

	function set_ReloadEnabled($_lzmppyh45a2s4diy86cwxo1c42)
		{
		if (is_bool($_lzmppyh45a2s4diy86cwxo1c42))
			{
			$this->_Ipx959qhm5s3v4cuqaflg = $_lzmppyh45a2s4diy86cwxo1c42;
			}
		}

	private $_0t5kmvmiqsqq4ks3;
	public

	function get_UseSmallIcons()
		{
		if (is_bool($this->_0t5kmvmiqsqq4ks3))
			{
			return $this->_0t5kmvmiqsqq4ks3;
			}
		  else
			{
			return ($this->ImageHeight < 50);
			}
		}

	public

	function set_UseSmallIcons($_0mue9j9d1521icqpbmsb8)
		{
		if (is_null($_0mue9j9d1521icqpbmsb8) || is_bool($_0mue9j9d1521icqpbmsb8))
			{
			$this->_0t5kmvmiqsqq4ks3 = $_0mue9j9d1521icqpbmsb8;
			}
		}

	private $_1h27ygoztf38duozl6nu5;
	public

	function get_UseHorizontalIcons()
		{
		if (is_bool($this->_1h27ygoztf38duozl6nu5))
			{
			return $this->_1h27ygoztf38duozl6nu5;
			}
		  else
			{
			return ($this->ImageHeight < 40);
			}
		}

	public

	function set_UseHorizontalIcons($_0thycpj4j9b3h4ksu41jq)
		{
		if (is_null($_0thycpj4j9b3h4ksu41jq) || is_bool($_0thycpj4j9b3h4ksu41jq))
			{
			$this->_1h27ygoztf38duozl6nu5 = $_0thycpj4j9b3h4ksu41jq;
			}
		}

	private $_Icos2nahf7pse7so80htusfo2c;
	public

	function get_SoundIconUrl()
		{
		$_0ch8ercdae7eatjopk9aiz7f2i;
		if (BDC_StringHelper::HasValue($this->_Icos2nahf7pse7so80htusfo2c))
			{
			$_0ch8ercdae7eatjopk9aiz7f2i = $this->_Icos2nahf7pse7so80htusfo2c;
			}
		  else
			{
			$_0ch8ercdae7eatjopk9aiz7f2i = CaptchaUrls::DefaultSoundIconUrl();
			if ($this->UseSmallIcons)
				{
				$_0ch8ercdae7eatjopk9aiz7f2i = CaptchaUrls::SmallIconUrl($_0ch8ercdae7eatjopk9aiz7f2i);
				}
			}

		if ($this->SoundPackageMissing && $this->_0qfom03diklb4loflosqmpvlx8->WarnAboutMissingSoundPackages)
			{
			$_0ch8ercdae7eatjopk9aiz7f2i = CaptchaUrls::DisabledIconUrl($_0ch8ercdae7eatjopk9aiz7f2i);
			}

		return $_0ch8ercdae7eatjopk9aiz7f2i;
		}

	public

	function set_SoundIconUrl($_llubwdp20kn8avfi)
		{
		if (is_string($_llubwdp20kn8avfi))
			{
			$this->_Icos2nahf7pse7so80htusfo2c = $_llubwdp20kn8avfi;
			}
		}

	private $_i405ofm36knk9sv8vc3nvkqt1a;
	public

	function get_ReloadIconUrl()
		{
		$_lv7w0lp5yr8qpvufqqhbc;
		if (BDC_StringHelper::HasValue($this->_i405ofm36knk9sv8vc3nvkqt1a))
			{
			$_lv7w0lp5yr8qpvufqqhbc = $this->_i405ofm36knk9sv8vc3nvkqt1a;
			}
		  else
			{
			$_lv7w0lp5yr8qpvufqqhbc = CaptchaUrls::DefaultReloadIconUrl();
			if ($this->UseSmallIcons)
				{
				$_lv7w0lp5yr8qpvufqqhbc = CaptchaUrls::SmallIconUrl($_lv7w0lp5yr8qpvufqqhbc);
				}
			}

		return $_lv7w0lp5yr8qpvufqqhbc;
		}

	public

	function set_ReloadIconUrl($_1jwe3grsznzeo1nencqmj)
		{
		if (is_string($_1jwe3grsznzeo1nencqmj))
			{
			$this->_i405ofm36knk9sv8vc3nvkqt1a = $_1jwe3grsznzeo1nencqmj;
			}
		}

	public

	function get_RenderIcons()
		{
		return ($this->SoundEnabled || $this->_Ipx959qhm5s3v4cuqaflg);
		}

	public

	function get_TotalWidth()
		{
		$_1s2fijmr09wwu5tdx21u1 = $this->ImageWidth;
		if ($this->RenderIcons)
			{
			$_1s2fijmr09wwu5tdx21u1 = $_1s2fijmr09wwu5tdx21u1 + 3 * BDC_CaptchaDefaults::IconSpacing + $this->get_IconsDivWidth();
			}

		return $_1s2fijmr09wwu5tdx21u1;
		}

	public

	function get_TotalHeight()
		{
		return $this->ImageHeight;
		}

	public

	function get_DefaultIconWidth()
		{
		if ($this->UseSmallIcons)
			{
			return BDC_CaptchaDefaults::SmallIconSize;
			}
		  else
			{
			return BDC_CaptchaDefaults::IconSize;
			}
		}

	private $_Onya2s7kzkeaucl0vfeh8wtgaw;
	public

	function get_IconsDivWidth()
		{
		if (is_int($this->_Onya2s7kzkeaucl0vfeh8wtgaw) && (0 < $this->_Onya2s7kzkeaucl0vfeh8wtgaw))
			{
			return $this->_Onya2s7kzkeaucl0vfeh8wtgaw;
			}
		  else
			{
			return $this->DefaultIconsDivWidth;
			}
		}

	public

	function set_IconsDivWidth($_ld97g4v4pjvjntg6)
		{
		if (is_int($_ld97g4v4pjvjntg6))
			{
			$this->_Onya2s7kzkeaucl0vfeh8wtgaw = $_ld97g4v4pjvjntg6;
			}
		}

	public

	function get_DefaultIconsDivWidth()
		{
		if ($this->UseHorizontalIcons)
			{
			return 2 * $this->get_DefaultIconWidth() + 4 * BDC_CaptchaDefaults::IconSpacing;
			}
		  else
			{
			return $this->get_DefaultIconWidth() + BDC_CaptchaDefaults::IconSpacing;
			}
		}

	private $_0pgqdggsx9dd9f19uugvtk0w4k = - 255;
	public

	function get_TabIndex()
		{
		return $this->_0pgqdggsx9dd9f19uugvtk0w4k;
		}

	public

	function set_TabIndex($_oopw5cayhcxxk9z0)
		{
		$this->_0pgqdggsx9dd9f19uugvtk0w4k = (int)($_oopw5cayhcxxk9z0);
		}

	public

	function get_IsTabIndexSet()
		{
		$_I1xv22z3qdc6sm1s = false;
		if (-255 != $this->_0pgqdggsx9dd9f19uugvtk0w4k)
			{
			$_I1xv22z3qdc6sm1s = true;
			}

		return $_I1xv22z3qdc6sm1s;
		}

	private $_Iexcv9pzqzstrxhuvi37l4mzv1 = '';
	public

	function get_AdditionalCssClasses()
		{
		return $this->_Iexcv9pzqzstrxhuvi37l4mzv1;
		}

	public

	function set_AdditionalCssClasses($_0ihbtpeiivw62qy8zv7nv)
		{
		if (is_string($_0ihbtpeiivw62qy8zv7nv))
			{
			$this->_Iexcv9pzqzstrxhuvi37l4mzv1 = $_0ihbtpeiivw62qy8zv7nv;
			}
		}

	private $_1zf1vqcpds0l7e48h4d2u4b7u9 = '';
	public

	function get_AdditionalInlineCss()
		{
		return $this->_1zf1vqcpds0l7e48h4d2u4b7u9;
		}

	public

	function set_AdditionalInlineCss($_0zlcwm2pmthmf8bx)
		{
		if (is_string($_0zlcwm2pmthmf8bx))
			{
			$this->_1zf1vqcpds0l7e48h4d2u4b7u9 = $_0zlcwm2pmthmf8bx;
			}
		}

	private $_Iqz5savvtki9yk19 = '';
	public

	function get_AddScriptInclude()
		{
		return $this->_Iqz5savvtki9yk19;
		}

	public

	function set_AddScriptInclude($_i50r5a6fmhmv21vnj74e3)
		{
		if (is_bool($_i50r5a6fmhmv21vnj74e3))
			{
			$this->_Iqz5savvtki9yk19 = $_i50r5a6fmhmv21vnj74e3;
			}
		}

	private $_oinmkngh4k06ozekza3dcuff70 = '';
	public

	function get_AddInitScript()
		{
		return $this->_oinmkngh4k06ozekza3dcuff70;
		}

	public

	function set_AddInitScript($_0wgar7xjn5maxmos)
		{
		if (is_bool($_0wgar7xjn5maxmos))
			{
			$this->_oinmkngh4k06ozekza3dcuff70 = $_0wgar7xjn5maxmos;
			}
		}

	private $_Oj1zixycz8umcv1h;
	public

	function get_AutoUppercaseInput()
		{
		return $this->_Oj1zixycz8umcv1h;
		}

	public

	function set_AutoUppercaseInput($_ox8u6ugxpru9ehafml5vr)
		{
		if (is_bool($_ox8u6ugxpru9ehafml5vr))
			{
			$this->_Oj1zixycz8umcv1h = $_ox8u6ugxpru9ehafml5vr;
			}
		}

	private $_Otq1pld8jfskd79i;
	public

	function get_AutoFocusInput()
		{
		return $this->_Otq1pld8jfskd79i;
		}

	public

	function set_AutoFocusInput($_Ir44sv7g99ktjcif)
		{
		if (is_bool($_Ir44sv7g99ktjcif))
			{
			$this->_Otq1pld8jfskd79i = $_Ir44sv7g99ktjcif;
			}
		}

	private $_1bvikzxqoe422fj4h9gjvn8uie;
	public

	function get_AutoClearInput()
		{
		return $this->_1bvikzxqoe422fj4h9gjvn8uie;
		}

	public

	function set_AutoClearInput($_1q23z4r9tnxo22b3)
		{
		if (is_bool($_1q23z4r9tnxo22b3))
			{
			$this->_1bvikzxqoe422fj4h9gjvn8uie = $_1q23z4r9tnxo22b3;
			}
		}

	private $_l76jsos757yngvxix0by8;
	public

	function get_AutoReloadExpiredCaptchas()
		{
		return $this->_l76jsos757yngvxix0by8;
		}

	public

	function set_AutoReloadExpiredCaptchas($_Oocz5wl5fjhxgdgu6i3lu1nmk8)
		{
		if (is_bool($_Oocz5wl5fjhxgdgu6i3lu1nmk8))
			{
			$this->_l76jsos757yngvxix0by8 = $_Oocz5wl5fjhxgdgu6i3lu1nmk8;
			}
		}

	private $_1b210kqqlpqygfhjo9bfqzf9z5;
	public

	function get_AutoReloadTimeout()
		{
		return $this->_1b210kqqlpqygfhjo9bfqzf9z5;
		}

	public

	function set_AutoReloadTimeout($_Ow3awhg5roo8wdbz)
		{
		if (is_numeric($_Ow3awhg5roo8wdbz))
			{
			$this->_1b210kqqlpqygfhjo9bfqzf9z5 = $_Ow3awhg5roo8wdbz;
			}
		}

	private $_or98wt7vm5qerzp02rpsku8kqv;
	public

	function get_SoundStartDelay()
		{
		return $this->_or98wt7vm5qerzp02rpsku8kqv;
		}

	public

	function set_SoundStartDelay($_0gk0qb81rvu66sbu)
		{
		if (self::IsValidSoundStartDelay($_0gk0qb81rvu66sbu))
			{
			$this->_or98wt7vm5qerzp02rpsku8kqv = $_0gk0qb81rvu66sbu;
			}
		  else
			{
			$this->_or98wt7vm5qerzp02rpsku8kqv = BDC_CaptchaDefaults::SoundStartDelay;
			}
		}

	public static

	function IsValidSoundStartDelay($_ls46ude4nhf5jdhsnuqmd)
		{
		return (is_numeric($_ls46ude4nhf5jdhsnuqmd) && $_ls46ude4nhf5jdhsnuqmd >= BDC_CaptchaDefaults::MinSoundStartDelay && $_ls46ude4nhf5jdhsnuqmd <= BDC_CaptchaDefaults::MaxSoundStartDelay);
		}

	private $_193z0boeed7agxa525fb4;
	public

	function get_RemoteScriptEnabled()
		{
		return BDC_RemoteScriptHelper::GetRemoteScriptEnabled(true);
		}

	public

	function set_RemoteScriptEnabled($_lz91dposexvff9ywne8go)
		{
		if (is_bool($_lz91dposexvff9ywne8go))
			{
			$this->_193z0boeed7agxa525fb4 = $_lz91dposexvff9ywne8go;
			}
		}

	public function get_CaptchaImageUrl(){
		return CaptchaUrls::CaptchaImageUrl($this->CaptchaId, $this->InstanceId);
	}

	public function get_CaptchaSoundUrl(){
		return CaptchaUrls::CaptchaSoundUrl($this->CaptchaId, $this->InstanceId);
	}

	public

	function get_ScriptIncludeUrl()
		{
		return CaptchaUrls::ScriptIncludeUrl();
		}

	private $_l7rrhgxvpea3wuw0455ezv23a1;
	public

	function get_ImageClientId()
		{
		return $this->_l7rrhgxvpea3wuw0455ezv23a1;
		}

	protected
	function Load()
		{
		$this->_0ple7kvdfw5gc1rdm1bve->Load();
		}

	public

	function Save()
		{
		$this->_0ple7kvdfw5gc1rdm1bve->Save();
		}

	public

	function SaveCodes()
		{
		$this->_0ple7kvdfw5gc1rdm1bve->SaveCodeCollection();
		}

	public

	function get_IsSolved()
		{
		return BDC_Persistence_Load("\x42\x44\103\137\x49\163\123\157\154\x76\x65\x64\137" . $this->_i675vg6w17myfvnq7z3fb);
		}

	public

	function Reset()
		{
		BDC_Persistence_Clear("\x42\x44\x43\137\111\x73\123\x6f\x6c\166\145\144\x5f" . $this->_i675vg6w17myfvnq7z3fb);
		}

	public

	function Validate($_Idah105fd3s7uy84jqunqmqnzu = null, $_ooir9mijdz1nlzlo6zxhv5ejsp = null)
		{
		if (!isset($_Idah105fd3s7uy84jqunqmqnzu) && array_key_exists($this->_oh2qwpd2igyc0kn0tl2k4, $_REQUEST))
			{
			$_Idah105fd3s7uy84jqunqmqnzu = $_REQUEST[$this->_oh2qwpd2igyc0kn0tl2k4];
			$_Idah105fd3s7uy84jqunqmqnzu = trim($_Idah105fd3s7uy84jqunqmqnzu);
			}

		if (!isset($_ooir9mijdz1nlzlo6zxhv5ejsp) && array_key_exists($this->_Ifqvq0mx3ishpcl4shpwi, $_REQUEST))
			{
			$_ooir9mijdz1nlzlo6zxhv5ejsp = $_REQUEST[$this->_Ifqvq0mx3ishpcl4shpwi];
			}

		$_Ikhdke7n9c4ogfarxqpamlx6rg = false;
		if (isset($_Idah105fd3s7uy84jqunqmqnzu) && isset($_ooir9mijdz1nlzlo6zxhv5ejsp))
			{
			$_Ikhdke7n9c4ogfarxqpamlx6rg = $this->_0ple7kvdfw5gc1rdm1bve->Validate($_Idah105fd3s7uy84jqunqmqnzu, $_ooir9mijdz1nlzlo6zxhv5ejsp, BDC_ValidationAttemptOrigin::Server);
			}

		if ($_Ikhdke7n9c4ogfarxqpamlx6rg)
			{
			BDC_Persistence_Save("\102\x44\x43\137\111\x73\x53\x6f\154\166\x65\144\137" . $this->_i675vg6w17myfvnq7z3fb, true);
			}
		  else
			{
			BDC_Persistence_Clear("\x42\104\103\x5f\111\x73\x53\x6f\x6c\x76\x65\x64\137" . $this->_i675vg6w17myfvnq7z3fb);
			}

		return $_Ikhdke7n9c4ogfarxqpamlx6rg;
		}

	public

	function AjaxValidate($_lzcbbsj9t3im4obtahfwz = null, $_le7f7f4gqm3terjb1typu = null)
		{
		$_Ixaolibghweaocwj7kc4k = false;
		if (isset($_lzcbbsj9t3im4obtahfwz) && isset($_le7f7f4gqm3terjb1typu))
			{
			$_Ixaolibghweaocwj7kc4k = $this->_0ple7kvdfw5gc1rdm1bve->Validate($_lzcbbsj9t3im4obtahfwz, $_le7f7f4gqm3terjb1typu, BDC_ValidationAttemptOrigin::Client);
			}

		if ($_Ixaolibghweaocwj7kc4k)
			{
			BDC_Persistence_Save("\102\104\103\137\x49\x73\x53\157\x6c\166\145\144\x5f" . $this->_i675vg6w17myfvnq7z3fb, true);
			}
		  else
			{
			BDC_Persistence_Clear("\x42\x44\103\x5f\x49\x73\x53\x6f\x6c\x76\x65\144\137" . $this->_i675vg6w17myfvnq7z3fb);
			}

		return $_Ixaolibghweaocwj7kc4k;
		}

	public

	function get_SoundFilename()
		{
		if (SoundFormat::WavPcm16bit8kHzMono == $this->SoundFormat)
			{
			return "\143\141\x70\x74\x63\150\141\137{$this->InstanceId}\x2e\x77\x61\166";
			}
		  else
		if (SoundFormat::WavPcm8bit8kHzMono == $this->SoundFormat)
			{
			return "\x63\x61\x70\x74\x63\x68\141\x5f{$this->InstanceId}\x2e\167\141\166";
			}
		}

	public

	function Html()
		{
		$this->Save();
		$_ikydvhjopcmocyvjbhjdwcezqh = '';
		if (true === $this->TestModeEnabled)
			{
			$_ikydvhjopcmocyvjbhjdwcezqh.= "\x3c\x70\40\143\x6c\141\163\163\75\42\x42\x44\103\137\127\x61\162\x6e\151\x6e\147\42\76\x54\x65\x73\x74\x20\x4d\x6f\144\145\x20\x45\x6e\141\142\x6c\x65\x64\74\57\x70\x3e";
			}

		$_04oijlojr2ruiq1v = "\x42\x44\x43\x5f\x43\141\x70\164\x63\150\x61\104\151\x76";
		if (BDC_StringHelper::HasValue($this->_Iexcv9pzqzstrxhuvi37l4mzv1))
			{
			$_04oijlojr2ruiq1v = $_04oijlojr2ruiq1v . "\x20" . $this->_Iexcv9pzqzstrxhuvi37l4mzv1;
			}

		$_I3613k3r0t7zbuk4q448q5mokt = "\167\x69\x64\164\x68\72{$this->TotalWidth}\x70\x78\x3b\x20\150\x65\151\x67\150\164\x3a{$this->TotalHeight}\160\x78\x3b";
		if (BDC_StringHelper::HasValue($this->_1zf1vqcpds0l7e48h4d2u4b7u9))
			{
			$_I3613k3r0t7zbuk4q448q5mokt = $_I3613k3r0t7zbuk4q448q5mokt . "\40" . $this->_1zf1vqcpds0l7e48h4d2u4b7u9;
			}

		$_ikydvhjopcmocyvjbhjdwcezqh.= "\r\n\x20\x20\74\144\151\166\40\143\154\x61\x73\x73\x3d\"{$_04oijlojr2ruiq1v}\"\40\151\x64\75\"{$this->_19rfbwwg52f4hw0m}\137\103\141\160\x74\143\150\x61\x44\151\x76\"\40\163\x74\171\154\145\75\"{$_I3613k3r0t7zbuk4q448q5mokt}\"\x3e\74\x21\55\55\r\n";
		$_ikydvhjopcmocyvjbhjdwcezqh = $this->ekiqo($_ikydvhjopcmocyvjbhjdwcezqh);
		if ($this->RenderIcons)
			{
			$_ikydvhjopcmocyvjbhjdwcezqh.= "\40\x2d\55\x3e\74\57\x64\151\166\x3e\x3c\x21\x2d\55\r\n";
			}
		  else
			{
			$_ikydvhjopcmocyvjbhjdwcezqh.= "\40\x2d\x2d\x3e\74\x2f\144\x69\x76\76\r\n";
			}

		$_ikydvhjopcmocyvjbhjdwcezqh = $this->mtltk($_ikydvhjopcmocyvjbhjdwcezqh);
		$_ikydvhjopcmocyvjbhjdwcezqh = $this->v4elb($_ikydvhjopcmocyvjbhjdwcezqh);
		$_ikydvhjopcmocyvjbhjdwcezqh.= "\x20\x20\74\x2f\x64\x69\166\x3e\r\n";
		return $_ikydvhjopcmocyvjbhjdwcezqh;
		}

	private
	function ekiqo($_l3n5ceitp053p6kwd1x8dznx1p)
		{
		$_l3n5ceitp053p6kwd1x8dznx1p.= "\x20\x2d\55\76\74\x64\x69\x76\40\143\x6c\x61\163\x73\75\"\102\x44\103\137\x43\141\x70\x74\x63\x68\x61\111\x6d\141\147\x65\104\151\166\"\x20\x69\144\x3d\"{$this->_19rfbwwg52f4hw0m}\137\103\x61\x70\164\x63\x68\141\111\155\141\x67\x65\104\151\166\"\40\163\x74\171\154\x65\x3d\"\x77\x69\144\164\150\x3a{$this->ImageWidth}\x70\170\x20\x21\151\155\160\157\x72\164\x61\156\x74\x3b\x20\150\x65\151\x67\150\x74\72{$this->ImageHeight}\x70\170\x20\41\151\x6d\x70\157\162\x74\x61\x6e\x74\x3b\"\x3e\x3c\x21\55\x2d\r\n";
		if (!$this->HelpLinkEnabled)
			{
			$_l3n5ceitp053p6kwd1x8dznx1p = $this->x8ns5($_l3n5ceitp053p6kwd1x8dznx1p);
			}
		  else
			{
			switch ($this->HelpLinkMode)
				{
			case HelpLinkMode::Image:
				$_l3n5ceitp053p6kwd1x8dznx1p = $this->lotn0($_l3n5ceitp053p6kwd1x8dznx1p);
				break;

			case HelpLinkMode::Text:
				$_l3n5ceitp053p6kwd1x8dznx1p = $this->le0yi($_l3n5ceitp053p6kwd1x8dznx1p);
				break;
				}
			}

		return $_l3n5ceitp053p6kwd1x8dznx1p;
		}

	private
	function x8ns5($_11fbngdxp3k9u6sb1y2my2mwqk)
		{
		$_11fbngdxp3k9u6sb1y2my2mwqk.= "\x20\x20\x20\x2d\x2d\76\74\151\x6d\147\x20\143\x6c\x61\163\x73\x3d\"\x42\x44\x43\137\103\x61\160\164\x63\150\141\111\155\141\147\x65\"\x20\151\144\x3d\"{$this->_l7rrhgxvpea3wuw0455ezv23a1}\"\40\163\x72\143\x3d\"{$this->CaptchaImageUrl}\"\x20\x61\154\164\x3d\"{$this->ImageTooltip}\"\x20\x2f\76\74\x21\x2d\55\r\n";
		return $_11fbngdxp3k9u6sb1y2my2mwqk;
		}

	private
	function lotn0($_078r4l3tkdiwujmv)
		{
		if ($this->IsTabIndexSet)
			{
			$_078r4l3tkdiwujmv.= "\x20\x20\40\x2d\x2d\x3e\74\141\40\150\162\x65\x66\x3d\"{$this->HelpLinkUrl}\"\x20\164\x69\164\154\x65\75\"{$this->HelpLinkText}\"\40\164\141\x62\151\x6e\x64\145\x78\75\"{$this->_0pgqdggsx9dd9f19uugvtk0w4k}\"\40\157\x6e\x63\154\x69\143\x6b\x3d\"{$this->_19rfbwwg52f4hw0m}\56\x4f\156\x48\x65\x6c\x70\114\x69\156\x6b\103\154\x69\x63\x6b\x28\x29\x3b\x20\162\x65\164\165\x72\x6e\x20{$this->_19rfbwwg52f4hw0m}\x2e\x46\157\154\154\157\x77\x48\145\x6c\x70\114\x69\x6e\153\73\"\x3e\74\x69\155\x67\40\x63\x6c\x61\163\x73\75\"\x42\x44\x43\137\103\141\x70\164\143\x68\141\x49\155\141\x67\x65\"\x20\x69\x64\75\"{$this->_l7rrhgxvpea3wuw0455ezv23a1}\"\x20\163\x72\x63\75\"{$this->CaptchaImageUrl}\"\40\x61\x6c\x74\75\"{$this->ImageTooltip}\"\x20\57\x3e\x3c\x2f\141\76\74\x21\x2d\55\r\n";
			if (-1 != $this->_0pgqdggsx9dd9f19uugvtk0w4k)
				{
				$this->_0pgqdggsx9dd9f19uugvtk0w4k++;
				}
			}
		  else
			{
			$_078r4l3tkdiwujmv.= "\40\40\40\x2d\x2d\x3e\x3c\x61\40\x68\x72\x65\146\x3d\"{$this->HelpLinkUrl}\"\40\x74\x69\164\154\145\x3d\"{$this->HelpLinkText}\"\40\x6f\x6e\143\154\151\x63\153\75\"{$this->_19rfbwwg52f4hw0m}\56\117\x6e\110\x65\x6c\160\x4c\151\x6e\x6b\103\154\151\x63\153\x28\x29\73\40\x72\145\164\x75\x72\x6e\40{$this->_19rfbwwg52f4hw0m}\56\106\157\x6c\154\x6f\x77\110\145\154\x70\114\x69\x6e\153\x3b\"\76\74\x69\x6d\x67\x20\143\154\141\x73\x73\x3d\"\x42\x44\103\137\103\x61\x70\x74\143\150\x61\111\155\x61\x67\145\"\x20\151\x64\x3d\"{$this->_l7rrhgxvpea3wuw0455ezv23a1}\"\x20\163\x72\x63\x3d\"{$this->CaptchaImageUrl}\"\40\x61\154\164\x3d\"{$this->ImageTooltip}\"\x20\57\x3e\x3c\x2f\x61\76\x3c\41\55\55\r\n";
			}

		return $_078r4l3tkdiwujmv;
		}

	private function le0yi($_1hmztnsu28klq8qeiz06dt0gzb)
	{
		$_oa8qm7cq3ntznyk8bhlc2xj2xk = $this->TotalHeight - $this->p3hk0();
		$_1hmztnsu28klq8qeiz06dt0gzb.= "\x20\40\x20\55\55\x3e\74\144\x69\x76\x20\x63\154\x61\x73\163\75\"\102\x44\x43\137\103\141\160\164\143\150\141\111\x6d\x61\147\145\104\x69\x76\"\40\163\164\x79\x6c\145\75\"\x77\x69\x64\x74\x68\72{$this->ImageWidth}\x70\170\x3b\x20\150\145\x69\147\x68\164\72{$_oa8qm7cq3ntznyk8bhlc2xj2xk}\160\170\73\"\76\74\151\x6d\147\40\x63\x6c\x61\x73\163\75\"\x42\x44\103\x5f\x43\x61\x70\x74\143\150\141\111\155\141\x67\145\"\40\151\144\75\"{$this->_l7rrhgxvpea3wuw0455ezv23a1}\"\x20\163\x72\x63\75\"{$this->CaptchaImageUrl}\"\x20\x61\x6c\164\75\"{$this->ImageTooltip}\"\40\57\x3e\x3c\x2f\144\x69\166\76\x3c\41\55\55\r\n";
		$_o5kkqresvqdjby1uvanpaf518s = $this->p3hk0();
		$_0v0992dq4yklh2v6 = $_o5kkqresvqdjby1uvanpaf518s - 1;
		if ($this->IsTabIndexSet)
			{
			$_1hmztnsu28klq8qeiz06dt0gzb.= "\40\x20\x20\x2d\x2d\x3e\74\x61\x20\150\x72\x65\146\x3d\"{$this->HelpLinkUrl}\"\40\x74\x61\142\151\156\x64\145\170\x3d\"{$this->_0pgqdggsx9dd9f19uugvtk0w4k}\"\x20\x74\151\x74\x6c\x65\75\"{$this->HelpLinkText}\"\40\163\x74\x79\x6c\145\x3d\"\x64\151\163\160\x6c\141\171\72\x20\x62\x6c\x6f\x63\153\x20\x21\151\x6d\160\157\162\x74\141\x6e\x74\x3b\x20\x68\x65\151\x67\x68\164\x3a\x20{$_o5kkqresvqdjby1uvanpaf518s}\160\170\x20\x21\151\x6d\x70\x6f\x72\164\141\156\164\73\40\155\141\x72\x67\151\156\x3a\40\x30\40\x21\151\x6d\x70\x6f\162\164\141\156\164\x3b\40\160\141\144\x64\151\x6e\147\x3a\x20\x30\40\41\151\155\x70\157\x72\164\141\156\x74\x3b\x20\x66\x6f\156\x74\55\163\x69\x7a\145\72\40{$_0v0992dq4yklh2v6}\x70\170\x20\41\x69\155\x70\157\x72\164\x61\156\164\x3b\40\x6c\151\156\x65\55\150\145\151\x67\x68\164\72\40{$_o5kkqresvqdjby1uvanpaf518s}\x70\x78\x20\41\x69\155\160\x6f\162\x74\x61\156\x74\73\x20\166\x69\163\x69\142\151\x6c\151\164\171\x3a\x20\166\151\163\x69\x62\x6c\145\x20\x21\151\x6d\160\x6f\162\164\141\156\x74\73\40\x66\157\x6e\164\55\x66\x61\x6d\151\154\x79\72\40\x56\x65\x72\x64\x61\x6e\x61\x2c\40\104\x65\152\141\126\x75\40\x53\141\156\163\x2c\40\102\x69\x74\x73\x74\162\x65\x61\155\x20\x56\145\x72\x61\x20\x53\141\156\x73\54\x20\x56\x65\162\144\x61\x6e\141\40\x52\145\x66\54\40\163\x61\156\x73\55\163\145\162\151\x66\40\41\x69\155\x70\x6f\162\164\141\156\164\x3b\x20\x76\x65\162\x74\x69\x63\141\x6c\55\141\x6c\151\x67\x6e\x3a\40\x6d\151\144\144\154\145\40\x21\151\155\160\157\162\x74\141\156\x74\73\40\x74\145\x78\164\55\141\154\x69\147\156\x3a\x20\143\x65\156\x74\x65\162\x20\x21\151\x6d\x70\157\x72\164\x61\156\164\73\x20\x74\145\170\x74\x2d\x64\145\x63\x6f\x72\141\164\151\157\x6e\72\x20\x6e\157\x6e\x65\x20\41\x69\x6d\160\x6f\x72\x74\x61\x6e\164\x3b\x20\x62\x61\x63\x6b\147\162\x6f\x75\x6e\x64\x2d\143\x6f\154\x6f\x72\72\x20\43\x66\x38\x66\x38\146\x38\40\x21\x69\x6d\x70\x6f\162\x74\x61\156\x74\x3b\40\x63\x6f\x6c\157\x72\x3a\x20\43\66\x30\66\x30\66\60\x20\x21\x69\155\x70\157\x72\x74\141\156\164\x3b\"\76{$this->HelpLinkText}\74\57\141\x3e\74\41\x2d\55\r\n";
			if (-1 != $this->_0pgqdggsx9dd9f19uugvtk0w4k)
				{
				$this->_0pgqdggsx9dd9f19uugvtk0w4k++;
				}
			}
		  else
			{
			$_1hmztnsu28klq8qeiz06dt0gzb.= "\40\x20\40\55\55\x3e\74\141\x20\150\162\145\x66\x3d\"{$this->HelpLinkUrl}\"\x20\164\x69\x74\x6c\145\x3d\"{$this->HelpLinkText}\"\x20\x73\x74\x79\154\x65\75\"\x64\x69\163\x70\154\x61\171\x3a\x20\142\154\157\143\x6b\40\x21\151\155\x70\x6f\x72\164\x61\x6e\164\x3b\40\150\145\x69\x67\150\164\x3a\40{$_o5kkqresvqdjby1uvanpaf518s}\160\x78\x20\x21\151\155\x70\157\x72\x74\141\156\164\x3b\x20\x6d\141\x72\147\x69\x6e\72\x20\x30\x20\41\x69\x6d\x70\157\x72\164\x61\x6e\164\73\x20\160\141\x64\144\151\x6e\x67\x3a\x20\60\x20\41\x69\155\x70\157\x72\164\141\156\164\x3b\40\x66\x6f\x6e\x74\55\x73\151\172\x65\72\40{$_0v0992dq4yklh2v6}\160\x78\x20\x21\x69\155\x70\x6f\x72\164\x61\156\x74\x3b\x20\x6c\151\x6e\x65\x2d\150\145\151\x67\150\164\x3a\x20{$_0v0992dq4yklh2v6}\160\x78\40\x21\151\x6d\x70\157\162\x74\141\x6e\164\x3b\40\166\151\163\x69\x62\151\x6c\x69\164\x79\x3a\40\x76\151\163\151\x62\x6c\x65\x20\41\x69\x6d\x70\x6f\x72\164\x61\x6e\164\73\x20\x66\157\x6e\x74\55\146\141\155\x69\x6c\x79\72\40\126\x65\162\144\141\156\141\x2c\40\104\x65\x6a\141\x56\x75\40\123\141\156\163\54\x20\102\x69\164\x73\x74\162\145\x61\155\x20\x56\145\x72\x61\40\123\141\156\163\x2c\40\x56\145\162\x64\141\x6e\x61\40\x52\x65\146\x2c\40\x73\141\156\x73\55\163\x65\162\151\x66\40\41\151\155\160\157\x72\x74\x61\156\164\73\40\166\145\x72\x74\x69\x63\141\154\x2d\141\154\x69\147\x6e\x3a\x20\155\x69\x64\144\154\x65\40\41\x69\155\x70\157\162\x74\x61\x6e\x74\x3b\40\164\145\170\164\x2d\x61\x6c\151\x67\x6e\72\x20\x63\x65\156\164\145\162\x20\41\x69\x6d\160\157\162\164\141\x6e\x74\x3b\40\164\x65\170\x74\x2d\x64\145\143\x6f\162\141\x74\151\157\x6e\x3a\x20\x6e\157\156\145\x20\x21\151\x6d\160\157\162\x74\141\156\164\73\40\142\x61\x63\x6b\147\x72\157\x75\x6e\x64\x2d\x63\x6f\154\x6f\162\x3a\40\x23\x66\x38\146\70\146\x38\x20\x21\x69\x6d\x70\x6f\162\x74\x61\x6e\164\x3b\x20\x63\157\x6c\x6f\x72\72\40\43\x36\x30\66\60\66\60\40\41\151\x6d\x70\157\x72\164\141\x6e\x74\73\"\76{$this->HelpLinkText}\74\57\x61\76\74\41\x2d\x2d\r\n";
			}

		return $_1hmztnsu28klq8qeiz06dt0gzb;
	}

	private function mtltk($_Iqm2urirv9cf3a8eutmaqusofg){
		if ($this->RenderIcons)
			{
			$_Iqm2urirv9cf3a8eutmaqusofg.= "\40\x2d\x2d\x3e\74\144\151\x76\40\143\154\141\163\163\x3d\"\x42\104\x43\x5f\x43\x61\160\x74\x63\x68\x61\111\x63\157\156\163\104\151\x76\"\40\x69\x64\75\"{$this->_19rfbwwg52f4hw0m}\137\103\x61\160\164\143\x68\x61\111\x63\x6f\156\163\104\151\166\"\40\x73\x74\171\x6c\145\x3d\"\x77\x69\144\x74\150\x3a\x20{$this->IconsDivWidth}\160\x78\x20\x21\x69\155\x70\x6f\162\x74\141\x6e\x74\x3b\"\76\74\x21\x2d\55\r\n";
			if ($this->ReloadEnabled)
				{
				if ($this->IsTabIndexSet)
					{
					$_Iqm2urirv9cf3a8eutmaqusofg.= "\x20\x20\40\55\55\76\x3c\x61\40\x63\x6c\141\163\163\75\"\x42\104\x43\137\122\145\154\x6f\141\144\x4c\x69\156\153\"\40\x69\144\x3d\"{$this->_19rfbwwg52f4hw0m}\x5f\122\x65\x6c\x6f\x61\144\x4c\x69\156\x6b\"\40\150\x72\x65\146\x3d\"\43\"\40\x74\141\142\151\x6e\x64\145\x78\75\"{$this->_0pgqdggsx9dd9f19uugvtk0w4k}\"\x20\157\156\143\154\151\x63\x6b\75\"{$this->_19rfbwwg52f4hw0m}\56\x52\145\x6c\157\x61\x64\111\155\141\x67\145\50\51\x3b\x20\164\x68\151\163\56\x62\x6c\x75\162\x28\51\73\x20\162\145\x74\165\162\156\40\x66\x61\154\x73\145\x3b\"\40\x74\x69\164\x6c\145\x3d\"{$this->ReloadTooltip}\"\x3e\x3c\151\155\147\x20\143\154\x61\163\163\x3d\"\x42\104\x43\137\122\145\x6c\x6f\x61\144\x49\143\157\156\"\40\x69\x64\75\"{$this->_19rfbwwg52f4hw0m}\x5f\x52\x65\x6c\157\x61\x64\111\143\157\156\"\40\x73\x72\143\75\"{$this->ReloadIconUrl}\"\x20\141\154\164\x3d\"{$this->ReloadTooltip}\"\40\57\x3e\74\x2f\x61\76\x3c\x21\55\55\r\n";
					if (-1 != $this->_0pgqdggsx9dd9f19uugvtk0w4k)
						{
						$this->_0pgqdggsx9dd9f19uugvtk0w4k++;
						}
					}
				  else
					{
					$_Iqm2urirv9cf3a8eutmaqusofg.= "\x20\40\x20\55\55\x3e\x3c\x61\x20\x63\x6c\141\163\x73\75\"\x42\x44\103\137\x52\145\x6c\x6f\x61\144\x4c\151\x6e\153\"\40\x69\144\x3d\"{$this->_19rfbwwg52f4hw0m}\137\122\x65\154\x6f\x61\x64\x4c\151\x6e\x6b\"\40\x68\x72\145\146\x3d\"\x23\"\40\x6f\x6e\143\x6c\151\x63\153\x3d\"{$this->_19rfbwwg52f4hw0m}\56\122\x65\154\157\141\144\111\x6d\141\x67\x65\x28\x29\73\40\164\150\x69\x73\56\x62\x6c\165\x72\x28\x29\x3b\x20\x72\x65\x74\x75\x72\156\40\146\141\x6c\x73\x65\x3b\"\x20\164\151\164\x6c\145\75\"{$this->ReloadTooltip}\"\x3e\74\x69\155\147\x20\143\154\x61\x73\163\x3d\"\102\104\103\x5f\x52\x65\x6c\157\x61\144\111\143\157\156\"\40\x69\x64\75\"{$this->_19rfbwwg52f4hw0m}\137\122\x65\x6c\157\141\x64\111\143\x6f\x6e\"\40\x73\x72\x63\x3d\"{$this->ReloadIconUrl}\"\x20\141\154\x74\75\"{$this->ReloadTooltip}\"\40\x2f\x3e\x3c\57\141\76\x3c\x21\55\55\r\n";
					}
				}

			$_ojvbpn8yx834y23r51ivm = $this->CaptchaSoundUrl;
			if ($this->SoundEnabled)
				{
				if ($this->CaptchaSoundAvailable)
					{
					if ($this->IsTabIndexSet)
						{
						$_Iqm2urirv9cf3a8eutmaqusofg.= "\40\40\40\x2d\55\76\x3c\x61\x20\x72\145\x6c\75\"\156\157\146\157\x6c\x6c\x6f\167\"\40\143\x6c\141\x73\163\75\"\102\x44\103\137\x53\x6f\x75\156\x64\x4c\x69\156\x6b\"\x20\151\144\x3d\"{$this->_19rfbwwg52f4hw0m}\x5f\x53\x6f\165\x6e\144\x4c\151\156\x6b\"\40\x68\x72\145\x66\75\"{$_ojvbpn8yx834y23r51ivm}\"\x20\164\x61\x62\151\156\144\145\x78\x3d\"{$this->_0pgqdggsx9dd9f19uugvtk0w4k}\"\x20\x6f\156\x63\154\151\x63\x6b\x3d\"{$this->_19rfbwwg52f4hw0m}\x2e\x50\x6c\x61\171\x53\x6f\165\x6e\x64\50\51\x3b\40\x74\x68\151\x73\x2e\x62\x6c\165\x72\50\x29\73\40\162\x65\164\x75\x72\156\x20\x66\141\x6c\163\x65\x3b\"\x20\x74\x69\x74\x6c\x65\x3d\"{$this->SoundTooltip}\"\x20\164\x61\x72\147\145\x74\x3d\"\x5f\x62\154\141\156\x6b\"\x3e\x3c\151\x6d\x67\x20\x63\154\x61\x73\x73\x3d\"\x42\x44\x43\137\x53\157\x75\156\144\x49\x63\x6f\x6e\"\x20\x69\x64\75\"{$this->_19rfbwwg52f4hw0m}\x5f\x53\x6f\165\156\144\x49\x63\157\x6e\"\x20\163\162\x63\75\"{$this->SoundIconUrl}\"\x20\x61\x6c\164\x3d\"{$this->SoundTooltip}\"\x20\57\76\x3c\x2f\x61\76\74\x21\x2d\x2d\r\n";
						}
					  else
						{
						$_Iqm2urirv9cf3a8eutmaqusofg.= "\40\40\40\55\55\76\x3c\x61\x20\162\x65\154\75\"\156\x6f\x66\x6f\x6c\x6c\157\167\"\x20\x63\x6c\141\x73\x73\x3d\"\102\x44\x43\x5f\x53\x6f\x75\156\144\114\151\x6e\153\"\x20\151\144\x3d\"{$this->_19rfbwwg52f4hw0m}\x5f\x53\x6f\165\x6e\x64\x4c\151\156\153\"\x20\x68\x72\x65\x66\x3d\"{$_ojvbpn8yx834y23r51ivm}\"\40\157\156\143\154\x69\143\153\75\"{$this->_19rfbwwg52f4hw0m}\56\x50\x6c\141\x79\x53\x6f\165\156\144\50\x29\x3b\40\x74\150\151\163\x2e\x62\154\165\162\50\x29\73\40\x72\145\x74\x75\162\x6e\x20\146\141\x6c\163\x65\x3b\"\40\164\x69\x74\x6c\145\x3d\"{$this->SoundTooltip}\"\40\164\x61\162\x67\x65\x74\75\"\x5f\x62\x6c\141\156\x6b\"\76\74\x69\x6d\147\x20\143\154\141\163\163\75\"\x42\104\x43\137\123\x6f\x75\x6e\144\111\143\x6f\x6e\"\x20\x69\144\x3d\"{$this->_19rfbwwg52f4hw0m}\x5f\x53\157\x75\x6e\x64\111\143\x6f\x6e\"\40\163\x72\143\75\"{$this->SoundIconUrl}\"\x20\x61\154\164\75\"{$this->SoundTooltip}\"\40\57\x3e\x3c\57\x61\76\x3c\x21\x2d\55\r\n";
						}
					}
				  else
				if ($this->_0qfom03diklb4loflosqmpvlx8->WarnAboutMissingSoundPackages)
					{
					$_Iqm2urirv9cf3a8eutmaqusofg.= "\40\x20\40\x2d\55\x3e\74\x61\40\x74\x61\162\x67\x65\x74\75\"\137\x62\154\141\x6e\x6b\"\x20\x63\x6c\x61\x73\x73\x3d\"\102\104\103\137\x44\x69\163\x61\x62\154\145\x64\x4c\151\x6e\x6b\"\x20\151\x64\75\"{$this->_19rfbwwg52f4hw0m}\x5f\123\x6f\x75\156\x64\x4c\x69\x6e\x6b\"\40\150\162\x65\146\75\"\x23\"\40\x74\141\142\x69\x6e\144\x65\x78\75\"{$this->_0pgqdggsx9dd9f19uugvtk0w4k}\"\x20\157\x6e\143\x6c\x69\143\153\75\"\164\x68\151\163\56\142\154\165\162\50\x29\73\40\x72\x65\164\x75\162\x6e\x20\x66\x61\x6c\x73\145\x3b\"\76\x3c\x69\x6d\147\40\143\x6c\141\x73\163\75\"\102\x44\103\x5f\123\x6f\165\x6e\144\x49\x63\157\156\"\x20\151\x64\75\"{$this->_19rfbwwg52f4hw0m}\137\123\157\165\156\x64\x49\x63\x6f\156\"\40\163\162\x63\75\"{$this->SoundIconUrl}\"\x20\x61\154\x74\75\"\"\x20\x2f\x3e\x3c\x73\x70\141\x6e\x3e{$this->SoundTooltip}\74\x2f\163\x70\x61\x6e\x3e\x3c\x2f\141\76\74\x21\x2d\55\r\n";
					}
				}

			if ($this->SoundEnabled)
				{
				$_Iqm2urirv9cf3a8eutmaqusofg.= "\40\40\40\55\x2d\x3e\74\144\151\x76\40\143\154\x61\x73\163\75\"\102\x44\103\x5f\x50\x6c\x61\143\x65\150\x6f\x6c\x64\x65\162\"\x20\151\144\x3d\"{$this->_19rfbwwg52f4hw0m}\x5f\101\165\x64\151\x6f\x50\x6c\x61\143\145\x68\157\154\x64\145\162\"\76\x26\156\x62\x73\160\x3b\x3c\x2f\x64\151\166\76\x3c\41\55\x2d\r\n";
				}

			$_Iqm2urirv9cf3a8eutmaqusofg.= "\40\x2d\55\x3e\74\57\x64\151\x76\76\r\n";
			}

		return $_Iqm2urirv9cf3a8eutmaqusofg;
	}

	private function v4elb($_Ilyx6euv3g2sgjut4201waq0z8){
		$_Oazvc0p1dhslp0vbldv2w = $this->AutoUppercaseInput ? "\164\162\165\145" : "\146\x61\154\x73\x65";
		$_ip0p3lry6bbc6pxam5f8mnrtbq = $this->AutoFocusInput ? "\164\x72\165\x65" : "\146\x61\x6c\x73\145";
		$_1cu4dm1956xl4bjiz75q3 = $this->AutoClearInput ? "\x74\162\165\x65" : "\x66\141\x6c\x73\145";
		$_1qeidb5ghz1uqkykqyi0x = $this->AutoReloadExpiredCaptchas ? "\x74\x72\x75\145" : "\146\x61\x6c\163\145";
		$_oaq07isasptz0622nd68hmb8ok = $this->CodeTimeout;
		$_Ocw5ni9qo2li918rain16 = $this->AutoReloadTimeout;
		$_l3zjub8lqn56wocsuukot = $this->SoundStartDelay;
		$_l5ql3vj9aezhr87cqtar2qnli0 = ($this->SoundRegenerationMode == SoundRegenerationMode::Limited) ? "\x74\x72\165\x65" : "\x66\141\154\163\x65";
		if ($this->AddScriptInclude)
			{
			$_Ilyx6euv3g2sgjut4201waq0z8.= "\x20\x20\x20\x20\74\x73\143\162\x69\160\x74\40\163\x72\x63\x3d\"{$this->ScriptIncludeUrl}\"\x20\164\x79\160\145\75\"\164\145\x78\164\57\152\x61\x76\141\163\143\162\151\x70\x74\"\x3e\74\57\x73\x63\162\151\x70\x74\76\r\n";
			}

		if ($this->AddInitScript)
			{
			$_Ilyx6euv3g2sgjut4201waq0z8.= "\40\40\40\x20\x3c\x73\143\x72\x69\x70\x74\40\x74\171\x70\x65\x3d\"\164\x65\170\164\57\152\x61\x76\141\x73\143\162\151\160\164\"\76\57\57\x3c\x21\133\103\x44\101\124\x41\x5b\r\n";
			$_Ilyx6euv3g2sgjut4201waq0z8.= "\40\40\x20\x20\x20\x20\x42\157\164\104\x65\x74\145\x63\164\x2e\x49\x6e\151\164\x28\x27{$this->_19rfbwwg52f4hw0m}\x27\54\40\x27{$this->InstanceId}\x27\54\40\47{$this->_oh2qwpd2igyc0kn0tl2k4}\x27\x2c\40{$_Oazvc0p1dhslp0vbldv2w}\54\x20{$_ip0p3lry6bbc6pxam5f8mnrtbq}\x2c\40{$_1cu4dm1956xl4bjiz75q3}\54\40{$_1qeidb5ghz1uqkykqyi0x}\54\40{$_oaq07isasptz0622nd68hmb8ok}\x2c\x20{$_Ocw5ni9qo2li918rain16}\x2c\x20{$_l3zjub8lqn56wocsuukot}\54\x20{$_l5ql3vj9aezhr87cqtar2qnli0}\x29\x3b\r\n";
			$_Ilyx6euv3g2sgjut4201waq0z8.= "\x20\x20\40\x20\57\57\x5d\x5d\x3e\x3c\x2f\163\x63\162\x69\x70\x74\x3e\r\n";
			}

		$_Ilyx6euv3g2sgjut4201waq0z8.= "\x20\40\x20\x20\x3c\x69\156\160\165\x74\40\164\x79\160\145\75\"\x68\x69\x64\x64\x65\x6e\"\40\x6e\x61\x6d\x65\x3d\"\102\x44\103\137\x55\163\x65\162\123\x70\145\143\x69\146\151\145\144\103\141\x70\164\143\x68\141\111\144\"\40\151\x64\x3d\"\102\x44\x43\137\125\163\x65\x72\x53\160\145\x63\151\146\x69\x65\144\x43\141\160\164\x63\x68\x61\x49\144\"\40\166\141\154\165\x65\x3d\"{$this->_19rfbwwg52f4hw0m}\"\40\57\x3e\r\n";
		$_Ilyx6euv3g2sgjut4201waq0z8.= "\x20\40\x20\40\x3c\x69\156\160\x75\x74\x20\x74\171\x70\x65\x3d\"\150\x69\144\144\x65\x6e\"\x20\156\x61\155\145\75\"{$this->_Ifqvq0mx3ishpcl4shpwi}\"\40\x69\x64\x3d\"{$this->_Ifqvq0mx3ishpcl4shpwi}\"\x20\166\x61\154\165\145\x3d\"{$this->InstanceId}\"\40\57\76\r\n";
		$_Ilyx6euv3g2sgjut4201waq0z8.= "\x20\x20\40\x20\74\x69\156\160\x75\x74\x20\164\x79\160\x65\x3d\"\150\151\144\144\x65\156\"\40\x6e\x61\155\x65\75\"\x42\x44\103\137\102\141\x63\x6b\x57\157\162\x6b\141\162\157\165\x6e\x64\x5f{$this->_19rfbwwg52f4hw0m}\"\40\x69\144\x3d\"\x42\x44\103\x5f\x42\x61\x63\153\127\x6f\162\x6b\x61\162\157\x75\x6e\x64\137{$this->_19rfbwwg52f4hw0m}\"\x20\166\x61\154\x75\145\x3d\"\60\"\x20\57\76\r\n";
		$_Ilyx6euv3g2sgjut4201waq0z8 = $this->yj2y9($_Ilyx6euv3g2sgjut4201waq0z8);
		return $_Ilyx6euv3g2sgjut4201waq0z8;
	}

	private function yj2y9($_1xxao5hsz6h494tthflqb){
	if ($this->RemoteScriptEnabled)
		{
		$_iyh8r4p12lfj3zjh2tx7vzyz1s = array(
			"\x4c\157\x63\x61\154\x65" => $this->Locale,
			"\111\155\141\x67\145\127\151\144\x74\x68" => $this->ImageWidth,
			"\x49\x6d\141\x67\145\x48\145\x69\x67\150\x74" => $this->ImageHeight
		);
		$_1xxao5hsz6h494tthflqb.= BDC_RemoteScriptHelper::GetRemoteScriptMarkup($_iyh8r4p12lfj3zjh2tx7vzyz1s);
		}

	return $_1xxao5hsz6h494tthflqb;
	}

	public static function IsFree(){
		return BDC_CaptchaBase::IsFree;
	}

	public static function GetProductInfo(){
		return BDC_CaptchaBase::$ProductInfo;
	}

	private function p3hk0(){
		return $this->HelpLinkHeight;
	}

	public static function LibInfo()
	{
		$_0weno5v440qqyye6 = '';
		$_0weno5v440qqyye6.= BDC_CaptchaBase::$ProductInfo["\x6e\x61\x6d\145"] . "\x20\166\x65\x72\163\151\157\156\x20" . BDC_CaptchaBase::$ProductInfo["\x76\x65\162\163\x69\157\156"];
		$_0weno5v440qqyye6.= "\x20" . (BDC_CaptchaBase::IsFree ? "\x46\162\145\145" : "\x45\x6e\x74\145\162\160\x72\x69\163\145");
		$_0weno5v440qqyye6.= "\x20\154\x6f\141\144\x65\x64\x20\x62\x79\x20\120\x48\x50\x20\x76\145\x72\x73\151\157\156\40" . PHP_VERSION;
		return $_0weno5v440qqyye6;
	}

	public function __get($_1c6vpgcgktp6nkdfbfgmfzlqyt)
		{
		if (method_exists($this->_0ple7kvdfw5gc1rdm1bve, ($_Oinf6c306s98kn7y = "\147\x65\164\x5f" . $_1c6vpgcgktp6nkdfbfgmfzlqyt)))
			{
			return $this->_0ple7kvdfw5gc1rdm1bve->$_Oinf6c306s98kn7y();
			}
		  else
		if (method_exists($this, ($_Oinf6c306s98kn7y = "\x67\x65\164\137" . $_1c6vpgcgktp6nkdfbfgmfzlqyt)))
			{
			return $this->$_Oinf6c306s98kn7y();
			}
		  else return;
		}

	public function __isset($_Otyr6ynezo5i0265)
		{
		if (method_exists($this->_0ple7kvdfw5gc1rdm1bve, ($_oh7q7g17h16ag01o2asoy = "\x69\x73\163\x65\x74\x5f" . $_Otyr6ynezo5i0265)))
			{
			return $this->_0ple7kvdfw5gc1rdm1bve->$_oh7q7g17h16ag01o2asoy();
			}
		  else
		if (method_exists($this, ($_oh7q7g17h16ag01o2asoy = "\151\x73\x73\145\164\x5f" . $_Otyr6ynezo5i0265)))
			{
			return $this->$_oh7q7g17h16ag01o2asoy();
			}
		  else return;
		}

	public function __set($_lp5vm16ivj8zfw1qas92p, $_llop5xvqpzzsiqyhgc88q)
	{
		if (method_exists($this->_0ple7kvdfw5gc1rdm1bve, ($_086lfeh1rd1f87ww = "\163\145\164\137" . $_lp5vm16ivj8zfw1qas92p)))
			{
			$this->_0ple7kvdfw5gc1rdm1bve->$_086lfeh1rd1f87ww($_llop5xvqpzzsiqyhgc88q);
			}
		  else
		if (method_exists($this, ($_086lfeh1rd1f87ww = "\x73\x65\x74\x5f" . $_lp5vm16ivj8zfw1qas92p)))
			{
			$this->$_086lfeh1rd1f87ww($_llop5xvqpzzsiqyhgc88q);
			}
	}

	public function __unset($_le7b9vsp4lzxxsly)
	{
		if (method_exists($this->_0ple7kvdfw5gc1rdm1bve, ($_ihrskx2vvf1qosxj85tpzlb01k = "\165\156\163\x65\164\x5f" . $_le7b9vsp4lzxxsly)))
			{
			$this->_0ple7kvdfw5gc1rdm1bve->$_ihrskx2vvf1qosxj85tpzlb01k();
			}
		  else
		if (method_exists($this, ($_ihrskx2vvf1qosxj85tpzlb01k = "\x75\x6e\163\145\164\x5f" . $_le7b9vsp4lzxxsly)))
			{
			$this->$_ihrskx2vvf1qosxj85tpzlb01k();
			}
		}
	}
?>