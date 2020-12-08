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
						<u-td>{{val.ranks}}</u-td>
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
				act_title: '总排名',
				page: 1,
				act_data: []
			}
		},
		onLoad() {
			this.ActivityRank()
		},
		methods: {
			async ActivityRank() {
				await uni.$u.api.AdminAllRank({}).then((res) => {
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
		display: flex;
	}
</style>
