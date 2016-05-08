<div class="page-header">
	<div class="row">
		<div class="col-lg-12">
			<h1>delete : <?php echo html_escape($blog->blog_title); ?></h1>
		</div>
	</div>
</div>

<?php echo validation_errors(); ?>

<div class="row">
	<div class="col-lg-12">
	<div class="well">
		<form class="form-horizontal" method="POST">
			<fieldset>

			<div class="form-group">
				<label class="col-lg-2 control-label">title</label>
				<div class="col-lg-10">
				<?php echo html_escape($blog->blog_title); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-2 control-label">description</label>
				<div class="col-lg-10">
				<?php echo html_escape($blog->blog_description); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
				<button type="submit" class="btn btn-primary">delete</button>
				</div>
			</div>

			</fieldset>
		</form>
	</div>
	</div>

</div>

