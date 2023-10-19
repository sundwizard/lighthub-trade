<div>
    <x-slot name="title">Activity Log</x-slot>
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="row g-gs">
                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">

                                        <div class="card-inner">
                                            <div class="card-head">
                                                <h1 class="overline-title-alt title">Activity Log</h1>
                                                    <div>
                                                        <x-search-input  wire:model="searchTerm"/>
                                                    </div>
                                            </div><hr>
                                            <div class="card card-bordered card-preview">
                                                <table class="table table-tranx">
                                                    <thead>
                                                        <tr class="tb-tnx-head">
                                                            <th class="tb-tnx-id"><span class="">#</span></th>
                                                            <th class="tb-tnx-info">
                                                                <span>
                                                                    Action
                                                                </span>
                                                            </th>
                                                            <th class="tb-tnx-info">
                                                                <span>
                                                                    Browser
                                                                </span>
                                                            </th>
                                                            <th class="tb-tnx-info">
                                                                <span>System Ip</span>
                                                            </th>
                                                            <th class="tb-tnx-info">
                                                                <span>Date</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($activities as $index=>$activity)
                                                        <tr class="tb-tnx-item">
                                                            <td class="tb-tnx-info">
                                                                <span>{{ $index+1}}</span>
                                                            </td>
                                                            <td class="tb-tnx-info">
                                                                <span>{{ $activity->action }}</span>
                                                            </td>
                                                            <td class="tb-tnx-info">
                                                                <span>{{ $activity->browser }}</span>
                                                            </td>
                                                            <td class="tb-tnx-info">
                                                                <span>{{ $activity->system_ip }}</span>
                                                            </td>
                                                            <td class="tb-tnx-info">
                                                                <span>{{ $activity->created_at }}</span>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                           <td colspan="5" class="text-center">
                                                              <img src="https://img.freepik.com/free-vector/
                                                                 no-data-concept-illustration_114360-626.jpg?size=626&ext=jpg&uid=R51823309&ga=GA1.2.224938283.1666624918&semt=sph"
                                                                 alt="No results found" style="width: 150px; height: 100px;">
                                                              <p class="mt-2 text-danger">No record found!</p>
                                                           </td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                                {{ $activities->links() }}
                                            </div><!-- .card-preview -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
</div>
