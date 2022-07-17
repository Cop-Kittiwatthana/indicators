<link rel="stylesheet" href="css/sweetalert2.min.css">
<script src="js/sweetalert2.min.js"></script>

<script>
	function isInputNumber(evt) {
		var ch = String.fromCharCode(evt.which);
		if (!(/[0-9]/.test(ch))) {
			evt.preventDefault();
		}
	}

	function isInputNumber2(evt) {
		var ch = String.fromCharCode(evt.which);
		if (!(/[0-9 && / && .]/.test(ch))) {
			evt.preventDefault();
		}
	}

	function isInputChar(evt) {
		var ch = String.fromCharCode(evt.which);
		if (!(/[a-z && A-Z && ก-ฮ && ะ && า &&  ิ &&  ี && ึ && ื && ุ && ู && เ && แ && โ && ์ && ่ && ้ && ๊ && ๋ && ๆ && ไ && ำ && ั && ็ && ใ]/.test(ch))) {
			evt.preventDefault();
		}
	}

	function isInputCharth(evt) {
		var ch = String.fromCharCode(evt.which);
		if (!(/[- &&ก-ฮ && ะ && า &&  ิ &&  ี && ึ && ื && ุ && ู && เ && แ && โ && ์ && ่ && ้ && ๊ && ๋ && ๆ && ไ && ำ && ั && ็ && ใ]/.test(ch))) {
			evt.preventDefault();
		}
	}

	function isInputChar1(evt) {
		var ch = String.fromCharCode(evt.which);
		if (!(/[. && a-z && A-Z && ก-ฮ && ะ && า &&  ิ &&  ี && ึ && ื && ุ && ู && เ && แ && โ && ์ && ่ && ้ && ๊ && ๋ && ๆ && ไ && ำ && ั && ็ && ใ]/.test(ch))) {
			evt.preventDefault();
		}
	}

	function isInputChar2(evt) {
		var ch = String.fromCharCode(evt.which);
		if (!(/[- && / && 0-9 && a-z && A-Z && ก-ฮ && ะ && า &&  ิ &&  ี && ึ && ื && ุ && ู && เ && แ && โ && ์ && ่ && ้ && ๊ && ๋ && ๆ && ไ && ำ && ั && ็ && ใ]/.test(ch))) {
			evt.preventDefault();
		}
	}

	function isInputPassword(evt) {
		var ch = String.fromCharCode(evt.which);
		if (!(/[a-z && A-Z && 0-9]/.test(ch))) {
			evt.preventDefault();
		}
	}
</script>