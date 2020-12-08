<template>
	<view style="width: 100%;height: 100%;">
		<u-navbar back-text="" :title="act_title">
		</u-navbar>
		<scroll-view scroll-y="true" class="scroll">
			<u-table>
				<u-tr>
					<u-th>名次</u-th>
					<u-th>用户</u-th>
					<u-th>积分</u-th>
				</u-tr>
				<view v-for="(val,key) in act_data" :key="val.act_id">
					<u-tr>  
						<u-td>{{(key + 1)}}</u-td>
						<u-td>{{val.user_name}}</u-td>
						<u-td>{{val.user_mark}}</u-td>
					</u-tr>
				</view>
			</u-table>
		</scroll-view>

	</view>
</template>

<script>
	export default {
		data() {
			return {
				act_title: '',
				page: 1,
				act_data: []
			}
		},
		onLoad(options) {
			this.act_title = options.act_title;
			this.ActivityRank(options.act_id);
		},
		methods: {
			async ActivityRank(act_id) {
				await uni.$u.api.ActivityRank({
					"act_id": act_id
				}).then((res) => {
					this.act_data = res.data
				})
			},
		}
	}
</script>

<style>

	.scroll {
		width: 100%;
		height: calc(100% - var(--status-bar-height) - 44px);
	}
</style>
