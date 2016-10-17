<h3>Browse by Tag</h3>
<div class="tag-cloud">
<?php $args = array(
    'smallest'                  => 10, 
    'largest'                   => 22,
    'unit'                      => 'pt', 
    'number'                    => 20,  
    'format'                    => 'flat',
    'separator'                 => "\n",
    'orderby'                   => 'name', 
    'order'                     => 'ASC',
    'exclude'                   => null, 
    'include'                   => null, 
    'topic_count_text_callback' => default_topic_count_text,
    'link'                      => 'view', 
    'taxonomy'                  => 'post_tag', 
    'echo'                      => true,
    'child_of'                  => null, // see Note!
); ?>
<?php wp_tag_cloud($args); ?>
</div>