<?php include(erLhcoreClassDesign::designtpl('lhchat/part/canned_messages_action_pre.tpl.php')); ?>
<?php if ($chat_part_canned_messages_action_enabled == true) : ?>
<div class="row">
	<div class="col-xs-8">
        <select class="form-control" name="CannedMessage-<?php echo $chat->id?>" id="id_CannedMessage-<?php echo $chat->id?>">
        	<option value=""><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat','Select a canned message')?></option>
        <?php 
        $nameSupport = (string)erLhcoreClassUser::instance()->getUserData(true)->name_support;
        foreach (erLhcoreClassModelCannedMsg::getCannedMessages($chat->dep_id,erLhcoreClassUser::instance()->getUserID()) as $item) : ?>
        	<option data-delay="<?php echo $item->delay?>" value="<?php echo $item->id?>"><?php echo htmlspecialchars(str_replace(array('{nick}','{operator}'), array($chat->nick,$nameSupport), $item->msg))?></option>
        <?php endforeach;?>
        </select>
     </div>
	<div class="col-xs-4 sub-action-chat">
		<a title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat','Fill textarea with canned message')?>" href="#" onclick="$('#CSChatMessage-<?php echo $chat->id?>').val(($('#id_CannedMessage-<?php echo $chat->id?>').val() > 0) ? $('#id_CannedMessage-<?php echo $chat->id?>').find(':selected').text() : '');return false;" class="btn btn-default icon-pencil"></a>
	</div>
</div>
<?php endif;?>