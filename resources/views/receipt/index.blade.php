<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex,nofollow" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0;" />

    <!-- Header -->
    <table width="100%" border="3" cellpadding="0" cellspacing="0" align="center" class="fullTable"
        bgcolor="">
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                    bgcolor="" style="border-radius: 10px 10px 0 0;">
                    <tr class="hiddenMobile">
                        <td height="40"></td>
                    </tr>
                    <tr class="visibleMobile">
                        <td height="30"></td>
                    </tr>

                    <tr>
                        <td>
                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                class="fullPadding">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table width="220" border="0" cellpadding="0" cellspacing="0"
                                                align="left" class="col">
                                                <tbody>
                                                    <tr>
                                                        <td align="left"> <img
                                                                src="http://www.supah.it/dribbble/017/logo.png"
                                                                width="32" height="32" alt="logo"
                                                                border="0" /></td>
                                                    </tr>
                                                    <tr class="hiddenMobile">
                                                        <td height="40"></td>
                                                    </tr>
                                                    <tr class="visibleMobile">
                                                        <td height="20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                                            Hello, {{ $user->name }}.
                                                            <br> Thank you for shopping from our store and for your
                                                            order.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table width="220" border="0" cellpadding="0" cellspacing="0"
                                                align="right" class="col">
                                                <tbody>
                                                    <tr class="visibleMobile">
                                                        <td height="20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 21px; color: #ff0000; letter-spacing: -1px; font-family: 'Open Sans', sans-serif; line-height: 1; vertical-align: top; text-align: right;">
                                                            Receipt
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <tr class="hiddenMobile">
                                                        <td height="50"></td>
                                                    </tr>
                                                    <tr class="visibleMobile">
                                                        <td height="20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                                                            <small>ORDER</small> #{{ $order_id }} <br />
                                                            <small>{{ $date }}</small>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- /Header -->
    <!-- Order Details -->
    <table width="100%" border="3" cellpadding="0" cellspacing="0" align="center" class="fullTable"
        bgcolor="">
        <tbody>
            <tr>
                <td>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                        class="fullTable" bgcolor="">
                        <tbody>
                            <tr>
                            <tr class="hiddenMobile">
                                <td height="60"></td>
                            </tr>
                            <tr class="visibleMobile">
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                        class="fullPadding">
                                        <tbody>
                                            <tr>
                                                <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;"
                                                    width="52%" align="left">
                                                    Item
                                                </th>
                                                <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                    align="left">
                                                    <small>SKU</small>
                                                </th>
                                                <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                    align="center">
                                                    Quantity
                                                </th>
                                                <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                    align="right">
                                                    Price
                                                </th>
                                            </tr>
                                            <tr>
                                                <td height="1" style="background: #bebebe;" colspan="4"></td>
                                            </tr>
                                            <tr>
                                                <td height="10" colspan="4"></td>
                                            </tr>
                                            @php
                                                $suma = 0 ;
                                            @endphp
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #ff0000;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">
                                                        {{ $product->name }}
                                                    </td>
                                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                        <small>{{ $product->sku }}</small>
                                                    </td>
                                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center">1</td>
                                                    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right">S/ {{$product->price }}</td>
                                                </tr>
                                                @php
                                                    $suma += $product->price;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="20"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- /Order Details -->
    <!-- Total -->
    <table width="100%" border="3" cellpadding="0" cellspacing="0" align="center" class="fullTable"
        bgcolor="">
        <tbody>
            <tr>
                <td>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                        class="fullTable" bgcolor="">
                        <tbody>
                            <tr>
                                <td>

                                    <!-- Table Total -->
									<table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
										class="fullPadding">
										<tbody>

											<tr>
												<td
													style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
													<strong>Total</strong>
												</td>
												<td
													style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
													<strong>S/ {{ $suma }}</strong>
												</td>
											</tr>
										</tbody>
									</table>
                                    <!-- /Table Total -->

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- /Total -->
    <!-- Information -->
    <table width="100%" border="3" cellpadding="0" cellspacing="0" align="center" class="fullTable"
        bgcolor="">
        <tbody>
            <tr>
                <td>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                        class="fullTable" bgcolor="">
                        <tbody>
                            <tr>
                            <tr class="hiddenMobile">
                                <td height="60"></td>
                            </tr>
                            <tr class="visibleMobile">
                                <td height="40"></td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- /Information -->
    <table width="100%" border="3" cellpadding="0" cellspacing="0" align="center" class="fullTable"
        bgcolor="">

        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                    class="fullTable" bgcolor="" style="border-radius: 0 0 10px 10px;">
                    <tr>
                        <td>
                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                class="fullPadding">
                                <tbody>
                                    <tr>
                                        <td
                                            style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                            Have a nice day.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr class="spacer">
                        <td height="50"></td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
    </table>
</body>

</html>l
