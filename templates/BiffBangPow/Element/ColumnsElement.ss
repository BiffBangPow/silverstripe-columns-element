<div class="py-4 py-xl-7">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <% if $ShowTitle %>
                    <h3 class="mb-5">$MarkdownText.Title.RAW</h3>
                <% end_if %>
            </div>
        </div>
        <div class="row">
            <% loop $Columns %>
                <div class="$ColumnClass">
                    <h4 class="mb-4">$Name</h4>
                    <div>$Description</div>
                    <% if $CTAType != 'None' %>
                        <div class="column-cta">
                            <p>
                                <a href="$CTALink" class="cta-link"
                                    <% if $CTAType == 'External' %>target="_blank" rel="noopener"
                                    <% else_if $CTAType == 'Download' %>download
                                    <% end_if %>>
                                    $LinkText
                                </a>
                            </p>
                        </div>
                    <% end_if %>
                </div>
            <% end_loop %>
        </div>
        <% if $CTAType != 'None' %>
            <div class="row">
                <div class="cta">
                    <p>
                        <a href="$CTALink" class="cta-link"
                            <% if $CTAType == 'External' %>target="_blank" rel="noopener"
                            <% else_if $CTAType == 'Download' %>download
                            <% end_if %>>
                            $LinkText
                        </a>
                    </p>
                </div>
            </div>
        <% end_if %>
    </div>
</div>


