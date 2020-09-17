 <!-- loopina visus errorus is db_query.php -->

<?php if(count($errors) > 0): ?>
    <div>
        <?php foreach($errors as $error):?>
            <div class="alert alert-danger mt-2" role="alert">
                <?php echo $error ?>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>