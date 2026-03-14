<!-- app/View/Statistics/utm_list.ctp -->

<?php
// // Рекурсивно отображаем дерево данных
// function renderTree($items) {
//     foreach ($items as $key => $subItems) {
//         // Вызываем соответствующий частичный шаблон для каждого уровня
//         if (is_array($subItems)) {
//             echo $this->element('Statistics/element/source', [
//                 'source' => $key,
//                 'mediums' => $subItems
//             ]);
//         }
//     }
// }

// // Вызываем рекурсивную функцию для отображения дерева
// renderTree($utmTree);

foreach ($utmTree as $key => $subItems) {
    // Вызываем соответствующий частичный шаблон для каждого уровня
    if (is_array($subItems)) {
        echo $this->element('Statistics/element/test');
    }
}
?>



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
