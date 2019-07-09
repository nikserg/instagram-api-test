<?php /** @var \InstagramAPI\Response\Model\PermanentItem|\InstagramAPI\Response\Model\DirectThreadItem $item */
?>
<div class="item">
    <?php
    switch ($item->getItemType()) {
        case 'text':
            echo $item->asArray()['text'];
            break;
        case 'action_log':
            $actionLog = new \InstagramAPI\Response\Model\ActionLog($item->asArray()['action_log']);
            echo $actionLog->getDescription();
            break;
        case 'voice_media':
            $voiceMedia = new \InstagramAPI\Response\Model\VoiceMedia($item->asArray()['voice_media']);
            echo "<audio controls><source src='" . $voiceMedia->getMedia()->getAudio()->getAudioSrc() . "'></audio>";
            break;
        case 'media':
            $media = new \InstagramAPI\Response\Model\DirectThreadItemMedia($item->asArray()['media']);

            if ($media->getMediaType() == \InstagramAPI\Response\Model\DirectThreadItemMedia::VIDEO) {

                echo "<video controls><source src='" . $media->getVideoVersions()[0]->getUrl() . "'></video>";
            } elseif ($media->getMediaType() == \InstagramAPI\Response\Model\DirectThreadItemMedia::AUDIO) {

                echo "<audio controls><source src='" . $media->getAudio()->getAudioSrc() . "'></audio>";
            } elseif ($media->getMediaType() == \InstagramAPI\Response\Model\DirectThreadItemMedia::PHOTO) {
                echo "<img src='" . $media->getImageVersions2()->getCandidates()[0]->getUrl() . "' />";
            }
            break;
        case 'like':
            echo "♥";
            break;
        default:
            echo "Неизвестный тип: " . $item->getItemType() . '<br /><pre>' . print_r($item->asArray(),
                    true) . '</pre>';
            break;
    } ?>
</div>
