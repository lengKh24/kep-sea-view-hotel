<div id="printTemplate" class="hidden">
    <div class="print-container bg-white text-slate-900 mx-auto" 
         style="width: 210mm; min-height: 297mm; padding: 15mm; position: relative; box-sizing: border-box; color: #1a1a1a;">
      
      <div class="flex justify-between items-end mb-12 pb-6 border-b-4 border-slate-900">
        <div>
          <h1 class="text-5xl font-black tracking-tighter uppercase leading-none mb-2">Invoice</h1>
          <p class="text-sm font-bold tracking-[0.2em] text-slate-400 uppercase">Official Receipt</p>
        </div>
        <div class="text-right">
          <p class="text-sm font-black uppercase">Invoice ID: <span id="p_invoice_id" class="text-blue-600"></span></p>
          <p class="text-xs font-bold text-slate-400 uppercase mt-1">Issued: <span id="p_date"></span></p>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-12 mb-12">
        <div class="border-l-4 border-blue-600 pl-6">
          <h3 class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3">Customer Information</h3>
          <p id="p_cus_name" class="text-2xl font-black leading-none mb-1"></p> 
          <p id="p_cus_contact" class="text-sm font-bold text-slate-500"></p>
        </div>
        <div class="text-right flex flex-col justify-end">
           <h2 class="text-xl font-black uppercase leading-tight">Kep Sea View Hotel</h2>
           <p class="text-xs font-bold text-slate-500 leading-relaxed mt-2">
             National Road #33A, Sangkat Kaeb, Kep Province<br>
             077 636 065 | Kepseaview@gmail.com<br>
             <span class="text-slate-900 underline">VAT-TIN: E122-2500001991</span>
           </p>
        </div>
      </div>

      <div class="grid grid-cols-4 border-2 border-slate-900 rounded-none mb-12 overflow-hidden shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
        <div class="py-5 px-4 border-r-2 border-slate-900 bg-slate-50">
            <p class="text-[9px] font-black uppercase tracking-widest text-slate-400 mb-1">Check In</p>
            <p class="text-sm font-black italic" id="p_check_in"></p>
        </div>
        <div class="py-5 px-4 border-r-2 border-slate-900">
            <p class="text-[9px] font-black uppercase tracking-widest text-slate-400 mb-1">Check Out</p>
            <p class="text-sm font-black italic" id="p_check_out"></p>
        </div>
        <div class="py-5 px-4 border-r-2 border-slate-900 bg-slate-50">
            <p class="text-[9px] font-black uppercase tracking-widest text-slate-400 mb-1">Nights (Qty)</p>
            <p class="text-sm font-black italic" id="p_qty"></p>
        </div>
        <div class="py-5 px-4 flex flex-col justify-center items-center">
            <p class="text-[9px] font-black uppercase tracking-widest text-slate-400 mb-1">Status</p>
            <span class="text-xs font-black uppercase px-3 py-1 bg-slate-900 text-white" id="p_status"></span>
        </div>
      </div>

      <table class="w-full mb-12">
        <thead>
          <tr class="border-b-4 border-slate-900">
            <th class="py-4 text-left text-[10px] font-black uppercase tracking-[0.2em]">Accommodation Description</th>
            <th class="py-4 text-right text-[10px] font-black uppercase tracking-[0.2em]">Unit Price</th>
            <th class="py-4 text-right text-[10px] font-black uppercase tracking-[0.2em]">Line Total</th>
          </tr>
        </thead>
        <tbody id="p_item_rows" class="divide-y divide-slate-200">
            </tbody>
      </table>

      <div class="flex justify-end mb-32">
        <div class="w-80 border-t-4 border-slate-900 pt-6">
            <div class="flex justify-between text-xs font-bold uppercase text-slate-400 mb-2">
                <span>Sub-Total</span>
                <span id="p_subtotal" class="text-slate-900"></span>
            </div>
            <div class="flex justify-between text-xs font-bold uppercase text-rose-500 mb-4">
                <span>Deposit Applied</span>
                <span id="p_deposit"></span>
            </div>
            <div class="flex justify-between items-center py-4 px-4 bg-slate-900 text-white">
                <span class="text-xs font-black uppercase italic tracking-widest">Grand Total</span>
                <span id="p_grand_total" class="text-3xl font-black"></span>
            </div>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-32 mt-auto">
        <div class="text-center relative">
          <div class="absolute -top-12 left-1/2 -translate-x-1/2 border-4 border-blue-600 text-blue-600 font-black px-4 py-1 text-xl uppercase -rotate-12 opacity-30 pointer-events-none">
            Original Receipt
          </div>
          <div class="border-t-2 border-slate-900 pt-4">
            <p class="text-[10px] font-black uppercase tracking-widest">Guest Signature</p>
          </div>
        </div>
        <div class="text-center">
          <div class="border-t-2 border-slate-900 pt-4">
            <p class="text-[10px] font-black uppercase tracking-widest">Authorized Cashier</p>
          </div>
        </div>
      </div>

      <p class="absolute bottom-10 left-15 right-15 text-[8px] text-center font-bold text-slate-300 uppercase tracking-[0.5em]">
        Thank you for choosing Kep Sea View Hotel
      </p>
    </div>
</div>