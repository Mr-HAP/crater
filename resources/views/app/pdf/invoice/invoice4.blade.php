{{--
    Invoice Template 4 - LitioByte Premium
    Basado en el diseño premium proporcionado
    Variables esperadas: $invoice, $company, $client, $items, $totals, $settings
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Invoice #{{ $invoice->invoice_number ?? '' }}</title>
    <style>
        body { font-family: 'Inter', Arial, sans-serif; background: #f5f7f9; color: #2c2f31; }
        .headline-font { font-family: 'Manrope', Arial, sans-serif; }
        .rounded-xl { border-radius: 0.5rem; }
        .rounded-full { border-radius: 0.75rem; }
        .border { border: 1px solid #e5e9eb; }
        .border-outline-variant { border-color: #abadaf; }
        .bg-surface { background: #f5f7f9; }
        .bg-white { background: #fff; }
        .bg-tertiary-container { background: #5afdc7; }
        .bg-surface-container-low { background: #eef1f3; }
        .bg-surface-container-lowest { background: #fff; }
        .bg-surface-container-highest { background: #d9dde0; }
        .bg-gradient-total { background: linear-gradient(135deg, #0050d4 0%, #7b9cff 100%); color: #f1f2ff; }
        .text-on-surface { color: #2c2f31; }
        .text-on-surface-variant { color: #595c5e; }
        .text-primary { color: #0050d4; }
        .text-xs { font-size: 0.75rem; }
        .text-sm { font-size: 0.875rem; }
        .text-lg { font-size: 1.125rem; }
        .text-xl { font-size: 1.25rem; }
        .text-2xl { font-size: 1.5rem; }
        .text-3xl { font-size: 1.875rem; }
        .font-bold { font-weight: bold; }
        .font-extrabold { font-weight: 800; }
        .font-black { font-weight: 900; }
        .font-medium { font-weight: 500; }
        .font-semibold { font-weight: 600; }
        .uppercase { text-transform: uppercase; }
        .tracking-widest { letter-spacing: 0.1em; }
        .tracking-tighter { letter-spacing: -0.03em; }
        .italic { font-style: italic; }
        .opacity-50 { opacity: 0.5; }
        .opacity-80 { opacity: 0.8; }
        .shadow-lg { box-shadow: 0 8px 24px 0 rgba(0,80,212,0.12); }
        .shadow-sm { box-shadow: 0 1px 2px 0 rgba(44,47,49,0.04); }
        .p-8 { padding: 2rem; }
        .p-6 { padding: 1.5rem; }
        .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
        .py-6 { padding-top: 1.5rem; padding-bottom: 1.5rem; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-12 { margin-bottom: 3rem; }
        .mb-16 { margin-bottom: 4rem; }
        .mt-12 { margin-top: 3rem; }
        .mt-16 { margin-top: 4rem; }
        .w-full { width: 100%; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .text-left { text-align: left; }
        .align-top { vertical-align: top; }
        .divide-y > tr + tr { border-top: 1px solid #e5e9eb; }
        .border-t { border-top: 1px solid #e5e9eb; }
        .border-b { border-bottom: 1px solid #e5e9eb; }
        .border-outline-variant\/10 { border-color: #e5e9eb; }
        .border-outline-variant\/15 { border-color: #d9dde0; }
        .border-outline-variant\/20 { border-color: #d0d5d8; }
        .bg-tertiary { background: #00684e; }
        .text-on-tertiary-container { color: #005e45; }
        .text-on-primary { color: #f1f2ff; }
        .text-on-primary-container { color: #001e5a; }
        .min-w-320 { min-width: 320px; }
        .headline-font { font-family: 'Manrope', Arial, sans-serif; }
        .flex { display: flex; }
        .flex-col { flex-direction: column; }
        .flex-row { flex-direction: row; }
        .justify-between { justify-content: space-between; }
        .justify-center { justify-content: center; }
        .items-center { align-items: center; }
        .items-end { align-items: flex-end; }
        .gap-4 { gap: 1rem; }
        .gap-8 { gap: 2rem; }
        .gap-12 { gap: 3rem; }
        .space-y-2 > * + * { margin-top: 0.5rem; }
        .space-y-4 > * + * { margin-top: 1rem; }
        .space-y-4 { margin-bottom: 1rem; }
        .max-w-5xl { max-width: 64rem; }
        .mx-auto { margin-left: auto; margin-right: auto; }
        .overflow-hidden { overflow: hidden; }
        .relative { position: relative; }
        .absolute { position: absolute; }
        .inset-0 { top: 0; right: 0; bottom: 0; left: 0; }
        .bg-gradient-to-br { background: linear-gradient(135deg, #0050d4 0%, #7b9cff 100%); }
        .rounded-xl { border-radius: 0.5rem; }
        .rounded-full { border-radius: 0.75rem; }
        .border { border: 1px solid #e5e9eb; }
        .border-outline-variant\/10 { border-color: #e5e9eb; }
        .border-outline-variant\/15 { border-color: #d9dde0; }
        .border-outline-variant\/20 { border-color: #d0d5d8; }
        .min-w-320 { min-width: 320px; }
        .w-2 { width: 0.5rem; }
        .h-2 { height: 0.5rem; }
        .mr-2 { margin-right: 0.5rem; }
        .mt-4 { margin-top: 1rem; }
        .pt-2 { padding-top: 0.5rem; }
        .px-2 { padding-left: 0.5rem; padding-right: 0.5rem; }
    </style>
</head>
<body class="bg-surface text-on-surface">
    <!-- Header -->
    <div class="flex flex-col flex-row justify-between items-start gap-8 mb-16">
        <div class="space-y-4">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-tertiary-container text-on-tertiary-container text-xs font-semibold tracking-wider uppercase border border-tertiary/20">
                <span class="w-2 h-2 rounded-full bg-tertiary mr-2"></span>
                {{ __('Verified Invoice') }}
            </div>
            <h1 class="headline-font text-6xl font-extrabold text-on-surface tracking-tighter">{{ __('INVOICE') }}</h1>
        </div>
        <div class="bg-surface-container-low p-8 rounded-xl border border-outline-variant/15 min-w-320">
            <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                <div>
                    <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest">{{ __('Invoice #') }}</p>
                    <p class="headline-font text-lg font-bold">{{ $invoice->invoice_number ?? '' }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest">{{ __('Date') }}</p>
                    <p class="headline-font text-lg font-bold">{{ \\Carbon\\Carbon::parse($invoice->issue_date)->format('M d, Y') }}</p>
                </div>
                <div class="col-span-2 pt-2 border-t border-outline-variant/10">
                    <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest">{{ __('Due Date') }}</p>
                    <p class="headline-font text-xl font-extrabold text-primary">{{ \\Carbon\\Carbon::parse($invoice->due_date)->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Entity Details -->
    <div class="flex flex-col flex-row gap-12 mb-16">
        <div class="p-8 rounded-xl bg-surface-container-lowest border border-outline-variant/10 shadow-sm">
            <h3 class="text-xs font-black text-on-surface-variant uppercase tracking-widest mb-4">{{ __('From:') }} {{ $company->name ?? '' }}</h3>
            <div class="space-y-2">
                <p class="headline-font font-bold text-xl text-on-surface">{{ $company->name ?? '' }}</p>
                <p class="text-on-surface-variant leading-relaxed">
                    {{ $company->address ?? '' }}<br/>
                    {{ $company->city ?? '' }}, {{ $company->state ?? '' }} {{ $company->zip ?? '' }}<br/>
                    {{ $company->country ?? '' }}
                </p>
                @if(!empty($company->tax_id))
                <p class="text-sm font-medium text-primary mt-4">{{ __('Tax ID:') }} {{ $company->tax_id }}</p>
                @endif
            </div>
        </div>
        <div class="p-8 rounded-xl bg-surface-container-lowest border border-outline-variant/10 shadow-sm">
            <h3 class="text-xs font-black text-on-surface-variant uppercase tracking-widest mb-4">{{ __('To:') }} {{ $client->name ?? '' }}</h3>
            <div class="space-y-2">
                <p class="headline-font font-bold text-xl text-on-surface">{{ $client->name ?? '' }}</p>
                <p class="text-on-surface-variant leading-relaxed">
                    {{ $client->address ?? '' }}<br/>
                    {{ $client->city ?? '' }}, {{ $client->state ?? '' }} {{ $client->zip ?? '' }}<br/>
                    {{ $client->country ?? '' }}
                </p>
                @if(!empty($client->email))
                <p class="text-sm font-medium text-on-surface-variant mt-4">{{ __('Contact:') }} {{ $client->email }}</p>
                @endif
            </div>
        </div>
    </div>
    <!-- Line Items Table -->
    <div class="mb-12 overflow-hidden rounded-xl border border-outline-variant/10 bg-surface-container-lowest">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-highest">
                    <th class="px-6 py-4 text-xs font-black text-on-surface uppercase tracking-widest">{{ __('Service') }}</th>
                    <th class="px-6 py-4 text-xs font-black text-on-surface uppercase tracking-widest">{{ __('Description') }}</th>
                    <th class="px-6 py-4 text-xs font-black text-on-surface uppercase tracking-widest text-center">{{ __('Qty') }}</th>
                    <th class="px-6 py-4 text-xs font-black text-on-surface uppercase tracking-widest text-right">{{ __('Unit Price') }}</th>
                    <th class="px-6 py-4 text-xs font-black text-on-surface uppercase tracking-widest text-right">{{ __('Total') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td class="px-6 py-6 align-top">
                        <p class="headline-font font-bold text-on-surface">{{ $item->name }}</p>
                    </td>
                    <td class="px-6 py-6 align-top">
                        <p class="text-sm text-on-surface-variant leading-relaxed">{{ $item->description }}</p>
                    </td>
                    <td class="px-6 py-6 align-top text-center font-medium">{{ $item->quantity }}</td>
                    <td class="px-6 py-6 align-top text-right font-medium">{{ currencyFormat($item->price, $invoice->currency) }}</td>
                    <td class="px-6 py-6 align-top text-right">
                        <span class="headline-font font-bold text-on-surface">{{ currencyFormat($item->total, $invoice->currency) }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Totals & Payment -->
    <div class="flex flex-col flex-row gap-12 items-end">
        <div class="flex-grow w-full p-8 rounded-xl bg-surface-container-low border border-outline-variant/10">
            <h4 class="text-xs font-black text-on-surface-variant uppercase tracking-widest mb-4">{{ __('Payment Instructions') }}</h4>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-on-surface-variant">{{ __('Bank Name') }}</p>
                    <p class="font-semibold">{{ $company->bank_name ?? '' }}</p>
                </div>
                <div>
                    <p class="text-on-surface-variant">{{ __('Account Name') }}</p>
                    <p class="font-semibold">{{ $company->bank_account_name ?? '' }}</p>
                </div>
                <div>
                    <p class="text-on-surface-variant">{{ __('SWIFT/BIC') }}</p>
                    <p class="font-semibold">{{ $company->bank_swift ?? '' }}</p>
                </div>
                <div>
                    <p class="text-on-surface-variant">{{ __('IBAN') }}</p>
                    <p class="font-semibold">{{ $company->bank_iban ?? '' }}</p>
                </div>
            </div>
        </div>
        <div class="w-full space-y-4">
            <div class="flex justify-between px-2">
                <span class="text-on-surface-variant font-medium">{{ __('Subtotal') }}</span>
                <span class="font-bold">{{ currencyFormat($totals['sub_total'], $invoice->currency) }}</span>
            </div>
            <div class="flex justify-between px-2">
                <span class="text-on-surface-variant font-medium">{{ __('IVA (16%)') }}</span>
                <span class="font-bold">{{ currencyFormat($totals['tax_total'], $invoice->currency) }}</span>
            </div>
            <div class="p-6 bg-gradient-total rounded-xl text-on-primary shadow-lg">
                <div class="flex justify-between items-center mb-1">
                    <span class="text-xs font-bold uppercase tracking-widest opacity-80">{{ __('Grand Total') }}</span>
                </div>
                <div class="headline-font text-3xl font-extrabold">{{ currencyFormat($totals['total'], $invoice->currency) }}</div>
            </div>
        </div>
    </div>
    <!-- End of Document -->
    <div class="mt-16 relative">
        <div aria-hidden="true" class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-outline-variant/10"></div>
        </div>
        <div class="relative flex justify-center">
            <span class="bg-surface px-4 text-xs font-bold text-on-surface-variant uppercase tracking-widest">{{ __('End of Document') }}</span>
        </div>
    </div>
    <div class="mt-12 text-center">
        <p class="headline-font text-2xl font-bold text-on-surface-variant italic opacity-50">{{ __('Thank you for your business.') }}</p>
    </div>
</body>
</html>
