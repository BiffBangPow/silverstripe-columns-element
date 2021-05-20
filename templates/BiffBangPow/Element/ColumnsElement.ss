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
                <div class="col-12 col-lg-4">
                    <h4 class="mb-4">$Name</h4>
                    <div>$Description</div>
                </div>
            <% end_loop %>
        </div>
    </div>
</div>


