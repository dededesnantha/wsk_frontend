<div class="w3-col m12 ">
    <div class="w3-margin" style="border: 2px solid #e8e8e8;border-top-width: 1px;background: #eee;">
        <div class="w3-container w3-padding-small">
            @foreach($breadcrumb  as $row)
                <small class="w3-text-grey">
                    @if($row['url'])                     
                        <a href="{{ $row['link'] }}" title="{{$row['name']}}">
                            <span> {{ $row['name'] }}</span>                            
                        </a> 
                    @else
                        <span> {{ $row['name'] }}</span>                    
                    @endif
                    @if($row['next']) / @endif                    
                </small>
            @endforeach            
        </div>
    </div>
</div>