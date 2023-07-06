<?php
function readMore($text, $limit) {
    $shortText = substr($text, 0, $limit);
    return '
    <div>
        <p id="text-short">' . htmlspecialchars($shortText) . '... 
            <a href="#" id="toggleButtonShort">Read More</a>
        </p>
        <p id="text-full" style="display: none;">' . htmlspecialchars($text) . '
            <a href="#" id="toggleButtonFull">Read Less</a>
        </p>
    </div>
    ';
}

echo readMore('Your long text goes here...', 100);
?>
<script src="/resources/js/ReadMore.js"></script>