<script>
	export default {
		onLaunch: function() {
			console.log('App Launch')
		},
		onShow: function() {
			console.log('App Show')
		},
		onHide: function() {
			console.log('App Hide')
		}
	}
</script>

<style lang="scss">
	/*每个页面公共css */
@import "uview-ui/index.scss";
@font-face {
  font-family: 'iconfont-ma';  /* project id 2210236 */
  src: url('//at.alicdn.com/t/font_2210236_1m55ay28mk7.eot');
  src: url('//at.alicdn.com/t/font_2210236_1m55ay28mk7.eot?#iefix') format('embedded-opentype'),
  url('//at.alicdn.com/t/font_2210236_1m55ay28mk7.woff2') format('woff2'),
  url('//at.alicdn.com/t/font_2210236_1m55ay28mk7.woff') format('woff'),
  url('//at.alicdn.com/t/font_2210236_1m55ay28mk7.ttf') format('truetype'),
  url('//at.alicdn.com/t/font_2210236_1m55ay28mk7.svg#iconfont') format('svg');
}

	page{
		width: 100%;
		height: 100%;
	}
</style>
