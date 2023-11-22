<div class="container">
    <div class="row">
        <div class="col-12">
            <% if $ShowTitle %>
                <h2 class="mb-4 element-title">$Title</h2>
            <% end_if %>
        </div>
    </div>
    <div class="row justify-content-center">
        <% loop $Columns %>
            <div class="$ColumnClass">
                <h3 class="mb-4 column-title">$Name</h3>
                <div>$Description</div>
                <% if $CTAType != 'None' %>
                    <div class="column-cta my-4 text-center">
                        <p>
                            <a href="$CTALink" class="cta-link btn btn-outline-primary"
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
        <div class="row mt-4">
            <div class="cta col-12 text-center">
                <p>
                    <a href="$CTALink" class="cta-link btn btn-outline-primary"
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
