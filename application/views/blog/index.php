<div class="page-header">
	<div class="row">
		<div class="col-lg-12">
			<h1>sample blog (というより bbs)</h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
	<div class="well">
		<form class="form-horizontal" method="POST">
			<fieldset>

			<div class="form-group">
				<label class="col-lg-2 control-label">title</label>
				<div class="col-lg-10">
				<input name="title" type="text" class="form-control" value="<?php echo set_value('title'); ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-2 control-label">description</label>
				<div class="col-lg-10">
				<input name="description" type="text" class="form-control" value="<?php echo set_value('description'); ?>">
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
				<button type="submit" class="btn btn-primary">submit</button>
				</div>
			</div>

			</fieldset>
		</form>
	</div>
	</div>

</div>


<?php if($entry): ?>
<ul class="list-group">
	<?php foreach($entry as $e): ?>
	<li class="list-group-item">
		<b><?php echo $e->blog_title; ?></b>


		<span class="badge"><?php echo $e->created_at; ?></span>
		<br>

		<?php echo $e->blog_description; ?>

		<div class="row text-right">

			<div class="col-sm-offset-8 col-sm-2">
			<a href="<?php echo base_url('blog/edit/' . $e->blog_id); ?>"
				class="btn btn-warning btn-block btn-xs">
				<i class="glyphicon glyphicon-edit"></i> edit
			</a>
			</div>

			<div class="col-sm-2">
			<a href="<?php echo base_url('blog/delete/' . $e->blog_id); ?>"
				class="btn btn-danger btn-block btn-xs">
				<i class="glyphicon glyphicon-trash"></i> delete
			</a>
			</div>

		</div>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
