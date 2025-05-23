<?php

namespace Chargebee\Responses\ItemResponse;
use Chargebee\Resources\Item\Item;

use Chargebee\ValueObjects\ResponseBase;

class ListItemResponse extends ResponseBase { 
    /**
    *
    * @var array<ListItemResponseListObject> $list
    */
    public array $list;
    
    /**
    *
    * @var ?string $next_offset
    */
    public ?string $next_offset;
    

    private function __construct(
        array $list,
        ?string $next_offset,
        array $responseHeaders=[],
        array $rawResponse=[]
    )
    {
        parent::__construct($responseHeaders, $rawResponse);
        $this->list = $list;
        $this->next_offset = $next_offset;
        
    }
    public static function from(array $resourceAttributes, array $headers = []): self
    {
            $list = array_map(function (array $result): ListItemResponseListObject {
                return new ListItemResponseListObject(
                    isset($result['item']) ? Item::from($result['item']) : null,
                );}, $resourceAttributes['list'] ?? []);
        
        return new self($list,
            $resourceAttributes['next_offset'] ?? null, $headers, $resourceAttributes);
    }

    public function toArray(): array
    {
        $data = array_filter([
            'list' => $this->list,
            'next_offset' => $this->next_offset,
        ]);
        return $data;
    }
}


class ListItemResponseListObject {
    
        public Item $item;
    
public function __construct(
    Item $item,
){ 
    $this->item = $item;

}
}

?>