<?php
if ($exhibit->title) {
    $exhibitTitle = $actionName . ' Exhibit: "' . $exhibit->title . '"';
} else {
    $exhibitTitle = $actionName . ' Exhibit';
}
?>
<?php head(array('title'=> html_escape($exhibitTitle), 'bodyclass'=>'exhibits')); ?>
<?php echo js('listsort'); ?>

<script type="text/javascript" charset="utf-8"> 
//<![CDATA[
    var listSorter = {};
    
    function makeSectionListDraggable()
    {
        var sectionList = jQuery('.section-list');
        var sectionListSortableOptions = {axis:'y'};
        var sectionListOrderInputSelector = '.section-info input';
        
	var sectionListDeleteLinksSelector = '.section-delete a';
	var sectionListDeleteConfirmationText = 'Are you sure you want to delete this section?';
        var sectionListFormSelector = '#exhibit-metadata-form';
	var sectionListCallback = Omeka.ExhibitBuilder.addStyling;
        makeSortable(sectionList, 
                     sectionListSortableOptions,
                     sectionListOrderInputSelector,
                     sectionListDeleteLinksSelector, 
                     sectionListDeleteConfirmationText, 
                     sectionListFormSelector, 
                     sectionListCallback);

        var pageListSortableOptions = {axis:'y', connectWith:'.page-list'};
        var pageListOrderInputSelector = '.page-info input';
        var pageListDeleteLinksSelector = '.page-delete a';
        var pageListDeleteConfirmationText = 'Are you sure you want to delete this page?';
        var pageListFormSelector = '#exhibit-metadata-form';
        var pageListCallback = Omeka.ExhibitBuilder.addStyling;
        
        var pageLists = jQuery('.page-list');
        jQuery.each(pageLists, function(index, pageList) {
            makeSortable(jQuery(pageList), 
                         pageListSortableOptions,
                         pageListOrderInputSelector, 
                         pageListDeleteLinksSelector, 
                         pageListDeleteConfirmationText, 
                         pageListFormSelector, 
                         pageListCallback);
            
            // Make sure the order inputs for pages change the names to reflect their new
            // section when moved to another section           
            jQuery(pageList).bind('sortreceive', function(event, ui) {                
                var pageItem = jQuery(ui.item);
                var orderInput = pageItem.find(pageListOrderInputSelector);              
                var pageId = orderInput.attr('name').match(/(\d+)/g)[1];                
                var nSectionId = pageItem.closest('li.exhibit-section-item').attr('id').match(/(\d+)/g)[0];
                var nInputName = 'Pages['+ nSectionId + ']['+ pageId  + '][order]';
                orderInput.attr('name', nInputName);
            });
        });
    }
    
    jQuery(window).load(function() {
        Omeka.ExhibitBuilder.wysiwyg();
        Omeka.ExhibitBuilder.addStyling();
        
        makeSectionListDraggable(); 
        
        // Fixes jQuery UI sortable bug in IE7, where dragging a nested sortable would
        // also drag its container. See http://dev.jqueryui.com/ticket/4333
        jQuery(".page-list li").hover(
            function(){
        	    jQuery(".section-list").sortable("option", "disabled", true);
            },
            function(){
        	    jQuery(".section-list").sortable("option", "disabled", false);
            }
        );
    });
//]]>   
</script>

<h1><?php echo html_escape($exhibitTitle); ?></h1>

<div id="primary">
    <div id="exhibits-breadcrumb">
        <a href="<?php echo html_escape(uri('exhibits')); ?>">Exhibits</a> &gt; <?php echo html_escape($actionName . ' Exhibit'); ?>
    </div>

<?php echo flash();?>

    <form id="exhibit-metadata-form" method="post" class="exhibit-builder">

        <fieldset>
            <legend>Exhibit Metadata</legend>
            <div class="field">
            <?php echo text(array('name'=>'title', 'class'=>'textinput', 'id'=>'title'), $exhibit->title, 'Exhibit Title'); ?>
            <?php echo form_error('title'); ?>
            </div>
            <div class="field">
            <?php echo text(array('name'=>'slug', 'id'=>'slug', 'class'=>'textinput'), $exhibit->slug, 'Exhibit Slug (no spaces or special characters)'); ?>
            <?php echo form_error('slug'); ?>
            </div>
            <div class="field">
            <?php echo text(array('name'=>'credits', 'id'=>'credits', 'class'=>'textinput'), $exhibit->credits,'Exhibit Credits'); ?>
            </div>
            <div class="field">
            <?php echo textarea(array('name'=>'description', 'id'=>'description', 'class'=>'textinput','rows'=>'10','cols'=>'40'), $exhibit->description, 'Exhibit Description'); ?>
            </div>   
            <?php $exhibitTagList = join(', ', pluck('name', $exhibit->Tags)); ?>
            <div class="field">
            <?php echo text(array('name'=>'tags', 'id'=>'tags', 'class'=>'textinput'), $exhibitTagList, 'Exhibit Tags'); ?>
            </div>
            <div class="field">
                <label for="featured">Exhibit is featured:</label>
                <div class="radio"><?php echo checkbox(array('name'=>'featured', 'id'=>'featured'), $exhibit->featured); ?></div>
            </div>
            <div class="field">
                <label for="featured">Exhibit is public:</label>
                <div class="radio"><?php echo checkbox(array('name'=>'public', 'id'=>'public'), $exhibit->public); ?></div>
            </div>
            <div class="field">
                <label for="theme">Exhibit Theme</label>            
                <?php $values = array('' => 'Current Public Theme') + exhibit_builder_get_ex_themes(); ?>
                <div class="select"><?php echo __v()->formSelect('theme', $exhibit->theme, array('id'=>'theme'), $values); ?>
                <?php if ($theme && $theme->hasConfig): ?><a href="<?php echo html_escape(uri("exhibits/theme-config/$exhibit->id")); ?>" class="configure-button button">Configure</a><?php endif;?>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Exhibit Sections and Pages</legend>
            <div id="section-list-container">
                <?php if (!$exhibit->Sections): ?>
                    <p>There are no sections.</p>
                <?php else: ?>
                <p id="reorder-instructions">To reorder sections or pages, click and drag the section or page up or down to the preferred location.</p>
                <?php endif; ?>
                <ul class="section-list">
                    <?php common('section-list', compact('exhibit'), 'exhibits'); ?>
                </ul>
            </div>
            <div id="section-add">
                <input type="submit" name="add_section" id="add-section" value="Add Section" />
            </div>
        </fieldset>
        <fieldset>
            <p id="exhibit-builder-save-changes">
                <input type="submit" name="save_exhibit" id="save_exhibit" value="Save Changes" /> or 
                <a href="<?php echo html_escape(uri('exhibits')); ?>" class="cancel">Cancel</a>
            </p>
        </fieldset>
    </form>     
</div>
<?php foot(); ?>
