<?php foreach ($data as $name => $items): ?>
    <div class="medium-item" style="margin-left: <?php echo $level * 20 ?>px;">
        <?php if ($level == 1): ?>
            <strong><?php echo h($name); ?></strong>
        <?php elseif (!is_array($items)): ?>
            <?php echo h($items); ?>
        <?php else: ?>
            <?php echo h($name); ?>
        <?php endif; ?>
        <?php if (is_array($items)): ?>
            <?php echo $this->element('Statistics/element/item', ['data' => $items, 'level' => $level + 1]); ?>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
