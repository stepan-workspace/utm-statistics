<div class="source-item mb-2">
    <div class="card">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0"><?php echo h($name); ?></h5>
            <button class="btn btn-primary toggle-medium" 
                data-target="#medium-<?php echo h($name); ?>"
                aria-expanded="false"
                aria-controls="medium-<?php echo h($name); ?>" 
                data-state="collapsed"
            >
                More <i class="fa fa-plus-circle"></i>
            </button>
        </div>
    </div>
    <div id="medium-<?php echo h($name); ?>" class="medium-list collapse">
        <?php echo $this->element('Statistics/element/item', ['data' => $data, 'level' => 1]); ?>
    </div>
</div>
