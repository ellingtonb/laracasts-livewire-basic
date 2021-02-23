<div wire:poll.1s="getRevenue">
    <p>Current time: {{ now(new DateTimeZone('America/Sao_Paulo'))->format('Y-m-d H:i:s') }}</p>
    <p>Revenue: ${{ $revenue }}</p>
</div>
