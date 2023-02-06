<?php


/* * **
 * 
 * 
 * Los modelos de regresión logística son modelos estadísticos en los que se desea conocer la relación
 *  entre la variable dependiente dicotómica (variable dependiente: Fracasada (1) y No fracasada (0)) 
 * y una o más variables explicativas independientes o covariables, ya sea cualitativa o cuantitativa
 * 
 * 
 * 
 * 
 * Ratio->  indicadores de la situación de la empresa.
 * 
 * 
 *        relación entre unidades financieras .i.
 *  
 * http://www.scielo.org.co/scielo.php?script=sci_arttext&pid=S1657-62762013000100012
 * 
 * 
 * 
 * 
 * Algunos ejemplos de variables que podian ser calculadas
 * 
 * 
 * Gastos no operacionales
 * Pasivo total-> patrimonio 
 * 
 * Utilidad entes de impuestos
 * Ingresos operacionales 
 * 
 * 
 *  * ** */
class Simulator {

    const MIN_CLIENTS = 1;
    /* TODO: This requirement is defined by the user, or study based    */
    const MAX_CLIENTS = 1000;

    public static function generate_items(): array {

        $product = array();
        /**   get the stock available * */
        /**   get the id for product to create * */
        /*         * *   generate the item quantity  * */
        /*         * *   insert records* */

        array_push($product, 7);

        return $product;
    }

    public static function generate_stock(): int {



        return 0;
    }

    public static function generate_client(int $max_capacity): int {

        $rand_client = 0;

        try {

            if ($max_capacity > self::MAX_CLIENTS) {
                throw new Exception("Some error message", 19);
            } else {
                $rand_client = rand(self::MIN_CLIENTS, $max_capacity);
            }
        } catch (Exception $ex) {
            echo "The exception code is: " . $ex->getCode();
        }

        return $rand_client;
    }

}

Simulator::generate_client(10);

/***
Referencias   recomendado leer estas falacias y crear el simulador con los criterios q dicen estos loquitos

Altman, E. (1961, September). Financial ratios, discriminant analysis and the prediction of corporate bankruptcy. Journal of Finance, 589-609.         [ Links ]
Altman, E. (1981). Financial Handbook. New York: John Wiley & Sons.         [ Links ]
Altman, E. (1988). The prediction of corporate bankruptcy. New York: Garland Publishing.         [ Links ]
Anzola, O. & Puentes, M, (2007). Determinantes de las acciones gerenciales en microem-presas y empresas Pymes. Bogotá: Universidad Externado de Colombia, Facultad de Administración de Empresas.         [ Links ]
Arquero, J., Abad, M. & Jiménez, S. (2009). Procesos de fracaso empresarial en Pymes, Identificación y contrastación empírica. Revista Internacional de la pequeña y mediana empresa, 1 (2), 64-77.         [ Links ]
Balcaen, S. & Ooghe, H. (2006). 35 years of studies on business failure: an overview of the classic statistical methodologies and their related problems. The British Accounting Review, 38, 63-93.         [ Links ]
BANCO INTERAMERICANO PARA EL DESARROLLO (2000). Apoyo a la pequeña y mediana empresa. New York: Publicaciones BID.         [ Links ]
BANCO MUNDIAL. (2008). Financiamiento Bancario para la pequeña y medianas empresas (Pyme). Bogotá, Colombia: Banco Mundial.         [ Links ]
Beaver, W. (1966). Financial ratios as predictor of failure. Empirical Research in Accounting: Selected Studies, Supplement to Journal of Accounting Research, 71-111.         [ Links ]
Cala, A. (2005). Situación y necesidades de la pequeña y mediana empresa. Civilizar, 1-22.         [ Links ]
CONGRESO DE LA REPÚBLICA COLOMBIA. (2004). Ley 905 de 2004 por medio de la cual se modifica la ley 590 de 2000 sobre promoción del desarrollo de la micro, pequeña y mediana empresa colombiana. Agosto 2 de 2004. Disponible en: http://www.elabedul.net/Documentos/Leyes/2004/Ley_905.pdf. Acceso: 21 febrero 2013.         [ Links ]
Deakin, B. (1972). A discriminant analysis of predictors of business failure. Journal of Accounting Research, X (1), 167-179.         [ Links ]
Enguídanos, A. (1994, enero - marzo). Los modelos del fracaso empresarial: una aplicación empírica del Logit. Revista Española de Financiación y Contabilidad, XXIV (78), 203-233.         [ Links ]
Ferrando, B. & Blanco, F. (1998). La previsión del fracaso empresarial en la comunidad Valenciana: Aplicación de los modelos discriminante y Logit. Revista Española de Financiación y Contabilidad, XXVII, (95) 499-540.         [ Links ]
FUNDES. (2010). Marcos legales para el fomento a la MIPYME en América Latina. Series Documentos de Trabajo, 3. Chile: Zona Creativa.         [ Links ]
García, D., Arqués, A. & Calvo-Flores, A. (1995, enero-marzo). Un modelo discriminante para evaluar el riesgo bancario en los créditos a empresas, Revista Española de Financiación y Contabilidad, XXIV (82), 175-200.         [ Links ]
Goudie, W. (1987). Forecasting corporate failure: The use of discriminant analysis within a disaggregated model of the corporate. Journal of the Royal Statistical Society. Series A. 150, (1), pp.69-81, Tomado de: http://www.jstor.org/stable/2981666.         [ Links ]
Graveline, J. & Kokalari, M. (2008). Credit risk. Working Paper, the Research Foundation of CFA Institute.         [ Links ]
Hernandez, M., Valero, J. & Bernardette, M. (2007). Perfil de riesgos del sistema bancario venezolano: Aplicación de la metodología de stress testing. N°94. Junio de 2007. Tomado de: http://www.bcv.org.ve/Upload/Publicaciones/docu94.pdf. Acceso: 02 de febrero de 2013.         [ Links ]
Laffarga, J., Martín J. & Vásquez, M. (1987). Predicción de la crisis bancaria en España: comparación entre el análisis Logit y el análisis discriminante. Cuadernos de Ciencias Económicas y Empresariales, 18, 49-57.         [ Links ]
Lizarraga, F. (1997). Utilidad de la información contable en el proceso de fracaso: análisis del sector industrial de la mediana empresa española. Revista Española de Financiación y Contabilidad, XXVI (92) 871-915.         [ Links ]
LO, A. (1986). Logit versus discriminant analysis: A specification test and application to corporate bankruptcies. Journal of Econometrics, 31, 151-178.         [ Links ]
Martínez, O. (2003). Determinantes de fragilidad en las empresas colombiana. Banco de la República de Colombia, Borradores de Economía 259, 1-24.         [ Links ]
Mateos, A., Marín, M., Vidal, S. & Seguí, E. (2011, abril). Los modelos de predicción del fracaso empresarial y su aplicabilidad en cooperativas agrarias. CIRIEC-España, Revista de Economía Pública, Social y Cooperativa, 70, 179-208.         [ Links ]
Mora, A. (2002, enero-junio). Los modelos de predicción de la insolvencia empresarial como herramienta de gestión. Revista del REFOR, 9-10, 30-36.         [ Links ]
Ohlson, A. (1980). Financial ratios and the probabilistic prediction of bankruptcy. Journal of Accounting Research,l8 (1), 109-131.         [ Links ]
Platt, H. & Platt, M. (2004). Industry-relative ratios revisited: the case of financial distress. Paper presented at the FMA 2004 Meeting, New Orleans (USA), pp. 6-9.         [ Links ]
PORTAFOLIO. (04 de noviembre de 2010). El país tiene 511.000 empresas familiares. Obtenido de http://www.portafolio.co/economia/el-pais-tiene-511000-empresas-familiares        [ Links ]
Rojas Gutiérrez, A. (2009). Empresas familiares, en cabeza de uno. Revista MM, 63, 82-88.         [ Links ]
Rubio, M. (2008). Análisis del fracaso empresarial en Andalucía especial referencia a la edad de la empresa. Cuadernos de CC.EE, 54, 35-56.         [ Links ]
SUPERINTENDENCIA DE SOCIEDADES DE COLOMBIA. (2011). Informe de gestión 2011. Tomado de: http://www.supersociedades.gov.co/ss/drvisapi.dll?MIval=sec&dir=190. Acceso: 10 febrero de 2013.         [ Links ]
Taffler, R. (1982). Forecasting company failure in the UK using discriminant analysis and financial ratio data. Journal of the Royal Statistical Society, 145, 342-358.         [ Links ]
Theodossiou, P. (1993). Predicting shifts in the mean of a multivariate time series Process: An application in predicting business failures. Journal of the American Statistical Association, 88, (422), 441-449.         [ Links ]
Vélez Cabrera, L. (2012). Causas de la insolvencia empresarial. Bogotá: Superintendencia de Sociedades.         [ Links ]
Vera, M. (2011, marzo) Metodología para el análisis de la gestión financiera en Pymes. Documento Escuela de Administración y Contaduría Pública, 10, 1-45. Bogotá: Universidad Nacional de Colombia.         [ Links ]
Vera, M. & Mora, E. (2011). Líneas de investigación en micro, pequeñas y medianas empresas. Revisión documental y desarrollo en Colombia. Revista Tendencias, Facultad de Ciencias económicas y Administrativas. Universidad de Nariño, 213-226.         [ Links ]
Zeballos, E. (2003, abril). Micro, pequeñas y medianas empresas en América Latina. Revista de CEPAL 79, 53-70.         [ Links ]
Zmijewski, M. (1984). Methodological issues related to the estimation of financial distress prediction models. Journal of Accounting Research, 22 (Supl.), 59-86. 
        */