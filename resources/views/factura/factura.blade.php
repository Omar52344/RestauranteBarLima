<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>

<style type="text/css">
    * {
        font-size: 10px;

    }
</style>


<body>


    <table border="0" cellpadding="0" cellspacing="0" width="252" bordercolor="grey">
        <colgroup>
            <col width="43" />
            <col width="82" />
            <col width="60" />
            <col width="67" />
        </colgroup>
        <tbody>
            <tr height="21">
                <td colspan="4" height="21" width="252" align="center">
                    <h3><strong>LIMA 1850</strong></h3>
                </td>
            </tr>
            <tr height="19">
                <td colspan="4" height="19" align="center">
                    Bar
                </td>
            </tr>
            <tr height="19">
                <td colspan="4" height="19" align="center">
                    NIT: 52129572-6
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                    <strong>Direccion:</strong>
                </td>
                <td>
                    CRA 5 # 119 - 11
                </td>
                <td align="left" valign="top">
                <!--
                    <img width="82" height="77"
                  
                        src="{{ asset('public/css/lima1850.jpg') }}"
                        alt="" />
                        -->
                    <table cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td height="19" width="60">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                    <strong>Telefono:</strong>
                </td>
                <td>
                    70311797
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                    <strong> WhatsApp:</strong>
                </td>
                <td>
                    3133441003
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr height="22">
                <td colspan="4" height="22" align="center">
                    <h4>BOGOTA D.C</h4>
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                    FECHA:
                </td>
                <td>
                    {{$facturaunica[0]["Fecha"]}}

                </td>
                <td>
                    HORA
                </td>
                <td>
                    {{$facturaunica[0]["Hora"]}}
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                    TIQUET N°:
                </td>
                <td>
                    {{$facturaunica[0]["idFactura"]}}
                </td>
                <td>
                    RETENCION
                </td>
                <td>
                    SERVICIO
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                    MESERO:
                </td>
                <td>
                    {{$facturaunica[0]["Mesero"]}}
                </td>
                <td>
                    % DE RETENCION
                </td>
                <td>
                    &nbsp;&nbsp;{{$facturaunica[0]["Descuento"]}}
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                    MESA:
                </td>
                <td>
                    {{$facturaunica[0]["Mesa"]}}
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                    UNIDAD
                </td>
                <td>
                    DESCRIPCION
                </td>
                <td>
                    PRECIO
                </td>
                <td>
                    TOTAL
                </td>
            </tr>

            @foreach($facturas as $factura)
            <tr height="19">
                <td height="19">
                    {{$factura["Cantidad"]}}
                </td>
                <td>
                    {{$factura["Descripcion"]}}
                </td>
                <td>
                    {{$factura["Precio"]}}
                </td>
                <td>
                    {{$factura["Total"]}}
                </td>
            </tr>
            @endforeach






            <!--<tr height="19">
            <td height="19">
                1
            </td>
            <td>
                CEVICHE MIXTO ESPECIAL
            </td>
            <td>
                47900
            </td>
            <td>
                47900
            </td>
        </tr>
        <tr height="19">
            <td height="19">
                1
            </td>
            <td>
                T-BONE STEAK A LA PARRILA
            </td>
            <td>
                60900
            </td>
            <td>
                60900
            </td>
        </tr>
        <tr height="19">
            <td height="19">
                1
            </td>
            <td>
                OTAZU ROSE
            </td>
            <td>
                85000
            </td>
            <td>
                85000
            </td>
        </tr>
        <tr height="19">
            <td height="19">
                1
            </td>
            <td>
                HAMBURGUESAS DE LANGOSTINOS
            </td>
            <td>
                33000
            </td>
            <td>
                33000
            </td>
        </tr>
        <tr height="19">
            <td height="19">
                3
            </td>
            <td>
                ENSALADA MIXTA
            </td>
            <td>
                9000
            </td>
            <td>
                27000
            </td>
        </tr>-->
            <tr height="19">
                <td height="19">
                </td>
                <td>
                </td>
                <td>
                    0
                </td>
                <td>
                    0
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                </td>
                <td>
                </td>
                <td>
                    0
                </td>
                <td>
                    0
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                </td>
                <td>
                </td>
                <td>
                    0
                </td>
                <td>
                    0
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                </td>
                <td>
                </td>
                <td>
                    0
                </td>
                <td>
                    0
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                </td>
                <td>
                </td>
                <td>
                    0
                </td>
                <td>
                    0
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                </td>
                <td>
                </td>
                <td>
                    0
                </td>
                <td>
                    0
                </td>
            </tr>
            <tr height="19">
                <td height="19">
                </td>
                <td>
                </td>
                <td>
                    0
                </td>
                <td>
                    0
                </td>
            </tr>
            <tr height="20">
                <td height="20">
                </td>
                <td>
                </td>
                <td>
                    0
                </td>
                <td>
                    0
                </td>
            </tr>
            <tr height="20">
                <td height="20">
                    CLIENTES
                </td>
                <td>
                    {{$facturaunica[0]["Clientes"]}}
                </td>
                <td>
                    SUB TOTAL
                </td>
                <td>
                    ${{$facturaunica[0]["Subtotal"]}}
                </td>
            </tr>
            <tr height="20">
                <td height="20">
                    RETENCION
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                    ${{$facturaunica[0]["ValorDescuento"]}}
                </td>
            </tr>
            <tr height="20">
                <td height="20">
                    VALOR S/S
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                    ${{$facturaunica[0]["ValorSS"]}}
                </td>
            </tr>
            <tr height="19">
                <td height="19" colspan="2">
                    SERVICIO RESTAURANTE
                </td>
                <td>
                </td>
                <td>
                    $ {{$facturaunica[0]["Servicio"]}}
                </td>
            </tr>
            <tr height="20">
                <td height="20">
                    <strong> TOTAL:</strong>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                    <strong> $ {{$facturaunica[0]["Total"]}}<strong>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
