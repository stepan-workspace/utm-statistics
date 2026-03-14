<?php foreach ($utmTree as $key => $subItems): ?>
    <?php echo $this->element('Statistics/element/source', ['name' => $key, 'data' => $subItems]);?>
<?php endforeach ?>

<?php if (!empty($this->Paginator->numbers())): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo $this->Paginator->prev('Previous') ? '' : 'disabled'; ?>">
                <?php echo $this->Paginator->prev('Previous', array('class' => 'page-link', 'escape' => false)); ?>
            </li>

            <?php
                echo $this->Paginator->numbers(array(
                    'separator' => '',
                    'class' => 'page-link',
                    'currentClass' => 'disabled text-muted',
                    'tag' => 'li',
                    'currentTag' => 'span'
                ));
            ?>

            <li class="page-item <?php echo $this->Paginator->next('Next') ? '' : 'disabled'; ?>">
                <?php echo $this->Paginator->next('Next', array('class' => 'page-link', 'escape' => false)); ?>
            </li>
        </ul>
    </nav>
<?php endif; ?>

<?php
    echo $this->Html->script('https://code.jquery.com/jquery-3.5.1.slim.min.js');
    echo $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js');
?>

<?php echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'); ?>

<script>
    $(document).ready(function(){
        $('.toggle-medium').click(function() {
            var target = $(this).data('target');
            var state = $(this).data('state');
            
            $(target).collapse('toggle');
            
            if (state === 'collapsed') {
                $(this).html('Close <i class="fa fa-plus-circle"></i>');
                $(this).data('state', 'expanded');
            } else {
                $(this).html('More <i class="fa fa-plus-circle"></i>');
                $(this).data('state', 'collapsed');
            }
        });
    });
</script>
