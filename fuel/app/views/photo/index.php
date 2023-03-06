<form data-bind="submit: addItem">
	お気に入りの場所を追加する
	<input type="text" class="favorite-place" style="width:100px;" data-bind='value: itemToAdd, valueUpdate: "afterkeydown"' />
	<button class="btn-addition" type="submit" data-bind="enable: itemToAdd().length > 0">追加</button>
</form>
<h4 class="favorite-list">お気に入り一覧</h4>
<select multiple="multiple" width="50"
	data-bind="options: allItems, selectedOptions: selectedItems"> </select>
<div class="favoritelist-delete-btn">
	<button class="btn btn-sm btn-danger" data-bind="click: removeSelected, enable: selectedItems().length > 0">削除</button>
</div>

<script>
	var BetterListModel = function() {
	this.itemToAdd = ko.observable("");
	this.allItems = ko.observableArray([""]);
	this.selectedItems = ko.observableArray([""]);
	
	this.addItem = function() {
		if ((this.itemToAdd() != "") && (this.allItems.indexOf(this.itemToAdd()) < 0))
			this.allItems.push(this.itemToAdd());
		this.itemToAdd("");
	};
	
	this.removeSelected = function() {
		this.allItems.removeAll(this.selectedItems());
		this.selectedItems([]); // 選択状態をクリア
	};
	
	this.sortItems = function() {
		this.allItems.sort();
		};
	};
	
	ko.applyBindings(new BetterListModel());
</script>

<?php
	
?>

<h2 class="post-list">投稿一覧</h2>
<br>
<?php if ($photos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>場所</th>
			<th></th>
			<th>コメント</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($photos as $item): ?>		
			<tr>
				<td><?php echo $item->place; ?></td>
				<td>
					<div class="btn-toolbar">
						<div class="btn-group">
							<?php echo Html::anchor('photo/view/'.$item->id, '<i class="icon-eye-open"></i> 詳細', ['class' => 'btn btn-default btn-sm']); ?>		

							<?php
								if ($item->user_id == Auth::get('id')) {
									echo Html::anchor('photo/edit/'.$item->id, '<i class="icon-wrench"></i> 編集', ['class' => 'btn btn-default btn-sm']); ?>
									<?php echo Html::anchor('photo/delete/'.$item->id, '<i class="icon-trash icon-white"></i> 削除', ['class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('削除しますか?')"]);
								} ?>

						</div>
						<td><?php echo $item->comment; ?></td>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>
<p>No Photos.</p>

<?php endif; ?>
