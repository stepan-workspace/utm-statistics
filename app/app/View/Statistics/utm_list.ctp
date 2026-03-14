<?php foreach ($utmTree as $source => $mediums): ?>

    <div>
        <strong><?php echo h($source); ?></strong>

        <?php foreach ($mediums as $medium => $campaigns): ?>

            <div style="margin-left:20px;">
                <?php echo h($medium); ?>

                <?php foreach ($campaigns as $campaign => $contents): ?>

                    <div style="margin-left:40px;">
                        <?php echo h($campaign); ?>

                        <?php foreach ($contents as $content => $terms): ?>

                            <div style="margin-left:60px;">
                                <?php echo h($content); ?>

                                <?php foreach ($terms as $term): ?>

                                    <div style="margin-left:80px;">
                                        <?php echo h($term); ?>
                                    </div>

                                <?php endforeach; ?>

                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endforeach; ?>

    </div>

<?php endforeach; ?>


<div class="pagination">
<?php
    echo $this->Paginator->prev('<< Previous ');
    echo $this->Paginator->numbers();
    echo $this->Paginator->next(' Next >>');
?>
</div>