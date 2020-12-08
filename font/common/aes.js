// const CryptoJS = require('../common/crypto-js'); //引用AES源码js
import Vue from 'vue'
import CryptoJS from 'crypto-js'

export default { //加密
	encrypt(word, keyStr) {
		var jsonWord = typeof(word) == "string" ? word : JSON.stringify(word); //判断对象是否为string类型
		keyStr = keyStr ? keyStr : 'abcdefghijklmnop'; //
		var key = CryptoJS.enc.Utf8.parse(keyStr); //Latin1 w8m31+Yy/Nw6thPsMpO5fg==
		var srcs = CryptoJS.enc.Utf8.parse(jsonWord);
		var encrypted = CryptoJS.AES.encrypt(srcs, key, {
			mode: CryptoJS.mode.ECB,
			padding: CryptoJS.pad.Pkcs7
		});
		return encrypted.toString();
	},
	//解密
	decrypt(word, keyStr) {
		keyStr = keyStr ? keyStr : 'abcdefghijklmnop';
		var key = CryptoJS.enc.Utf8.parse(keyStr); //Latin1 w8m31+Yy/Nw6thPsMpO5fg==
		var decrypt = CryptoJS.AES.decrypt(word, key, {
			mode: CryptoJS.mode.ECB,
			padding: CryptoJS.pad.Pkcs7
		});
		return CryptoJS.enc.Utf8.stringify(decrypt);
	}

}
