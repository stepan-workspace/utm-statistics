<?php
foreach ($utmTree as $source => $mediums): ?>

    <div class="source-item mb-2">

        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="card-title"><?php echo h($source); ?></h5>
                <button class="btn btn-primary toggle-medium" data-target="#medium-<?php echo h($source); ?>" aria-expanded="false" aria-controls="medium-<?php echo h($source); ?>" data-state="collapsed">
                    More <i class="fa fa-plus-circle"></i>
                </button>
            </div>
        </div>
        
        <div id="medium-<?php echo h($source); ?>" class="medium-list collapse">
            <?php foreach ($mediums as $medium => $campaigns): ?>
                <div class="medium-item" style="margin-left: 20px;">
                    <!-- Средний уровень: Medium -->
                    <strong><?php echo h($medium); ?></strong>

                    <!-- Вложенные элементы Campaign -->
                    <?php foreach ($campaigns as $campaign => $contents): ?>
                        <div class="campaign-item" style="margin-left: 40px;">
                            <!-- Кампания: Campaign -->
                            <?php echo h($campaign); ?>

                            <!-- Вложенные элементы Content -->
                            <?php foreach ($contents as $content => $terms): ?>
                                <div class="content-item" style="margin-left: 60px;">
                                    <!-- Контент: Content -->
                                    <?php echo h($content); ?>

                                    <!-- Вложенные элементы Term -->
                                    <?php foreach ($terms as $term): ?>
                                        <div class="term-item" style="margin-left: 80px;">
                                            <!-- Терм: Term -->
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
    </div>

<?php endforeach; ?>

<!-- Пагинация -->
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

<!-- Подключаем jQuery и Bootstrap JS для раскрывающихся элементов -->
<?php
    echo $this->Html->script('https://code.jquery.com/jquery-3.5.1.slim.min.js');
    echo $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js');
?>

<!-- Подключаем Font Awesome для иконок -->
<?php echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'); ?>

<script>
    $(document).ready(function(){
        // Обработчик для кнопки раскрытия/сворачивания
        $('.toggle-medium').click(function() {
            var target = $(this).data('target');
            var state = $(this).data('state');
            
            // Переключаем состояние collapse
            $(target).collapse('toggle');
            
            // Обновляем текст и иконку в зависимости от состояния
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
