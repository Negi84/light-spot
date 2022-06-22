 @if ($order->paymentstatus == 'TXN_SUCCESS')
     <!DOCTYPE html>
     <html>

     <head>
         <style>
             body {
                 width: 80%;
                 margin: 8%;
                 text-align: center;
             }

             table {
                 font-family: arial, sans-serif;
                 border-collapse: collapse;
                 width: 100%;
             }

             td,
             th {
                 border: 1px solid #dddddd;
                 text-align: left;
                 padding: 8px;
             }

             tr:nth-child(even) {
                 background-color: #dddddd;
             }

             button {
                 margin-top: 30px;
                 background-color: #3894da;
                 color: #fff;
                 border: none;
                 text-transform: uppercase;
                 min-width: 195px;
                 font-size: 14px;
                 font-weight: 600;
                 padding: 10px 16px;
                 cursor: pointer;
             }

             button:hover {
                 color: #fff;
                 background-color: #3894da;
             }

             h1 {
                 color: green;
             }
         </style>
     </head>

     <body>
         <h1>Transaction status is success</h1>
         <h2>Payment Details</h2>
         <table>
             <tr>
                 <th>ORDERID</th>
                 <th>TXNID</th>
                 <th>TXNAMOUNT</th>
                 <th>TXNDATE</th>
                 <th>STATUS</th>
             </tr>
             <tr>
                 <td>{{ $order->ORDER_ID }}</td>
                 <td>{{ $order->transaction_id }}</td>
                 <td>{{ $order->TXN_AMOUNT }}</td>
                 <td>{{ $order->date }}</td>
                 <td>{{ $order->paymentstatus }}</td>
             </tr>
         </table>
         <a href="http://gurukulspot.com"><button type="button">Home</button></a>
     </body>

     </html>
 @else
     <!DOCTYPE html>
     <html>

     <head>
         <style>
             body {
                 width: 80%;
                 margin: 8%;
                 text-align: center;
             }

             button {
                 margin-top: 30px;
                 background-color: #d01c68;
                 color: #fff;
                 border: none;
                 text-transform: uppercase;
                 min-width: 195px;
                 font-size: 14px;
                 font-weight: 600;
                 padding: 10px 16px;
                 cursor: pointer;
             }

             button:hover {
                 background-color: #a61150;
             }

             h1 {
                 color: #b74444;
             }
         </style>
     </head>

     <body>
         <h1 class>Transaction status is failure</h1>
         <h4>Something went wrong please try again later</h4>
         <a href="http://gurukulspot.com"><button type="button">Home</button></a>
     </body>

     </html>
 @endif
