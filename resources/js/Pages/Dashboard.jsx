import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";

export default function Dashboard({ auth }) {
    const { get } = useForm();

    // handlers
    const adminMenuHandler = (e) => get(route("user.listado"));
    const productsMenuHandler = (e) => get(route("producto.listado"));
    const sellsMenuHandler = (e) => get(route("venta.listado"));
    const buyMenuHandler = (e) => get(route("compras.listado"));
    const providersMenuHandler = (e) => get(route("proveedor.listado"));
    const bookMenuHandler = (e) => get(route("venta.caja"));

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Principal
                </h2>
            }
        >
            <Head title="Principal" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        {/* Title & logo */}
                        <div className="p-6 lg:p-8 bg-white border-b border-gray-200 flex flex-col items-center justify-center">
                            <div className="flex items-center justify-center">
                                <img
                                    src="images/brand/ctuLogo.png"
                                    alt="Logo"
                                    className="h-40 w-40"
                                />
                            </div>

                            <h1 className="mt-8 text-2xl font-medium text-gray-900">
                                Bienvenidos al sistema de gestión de{" "}
                                <span className="text-red-500">
                                    C-tú Indumentaria
                                </span>
                            </h1>
                        </div>

                        {/* cards */}
                        <div className="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                            {/* admin - menu */}
                            <div>
                                <div className="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth="1.5"
                                        stroke="currentColor"
                                        className="w-6 h-6 stroke-gray-400"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                                        />
                                    </svg>

                                    <h2 className="ml-3 text-xl font-semibold text-red-500">
                                        <a href="#" onClick={adminMenuHandler}>
                                            Administradores
                                        </a>
                                    </h2>
                                </div>

                                <p className="mt-4 text-gray-500 text-sm leading-relaxed">
                                    En esta sección podrá gestionar los datos de
                                    quienes administren el sitio.
                                </p>
                            </div>
                            {/* product - menu */}
                            <div>
                                <div className="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth="1.5"
                                        stroke="currentColor"
                                        className="w-6 h-6 stroke-gray-400"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                                        />
                                    </svg>

                                    <h2 className="ml-3 text-xl font-semibold text-red-500">
                                        <a
                                            href="#"
                                            onClick={productsMenuHandler}
                                        >
                                            Productos
                                        </a>
                                    </h2>
                                </div>

                                <p className="mt-4 text-gray-500 text-sm leading-relaxed">
                                    En esta sección podrá gestionar el stock de
                                    productos, precios y características de cada
                                    uno de ellos.
                                </p>
                            </div>
                            {/* sells - menu */}
                            <div>
                                <div className="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth="1.5"
                                        stroke="currentColor"
                                        className="w-6 h-6 stroke-gray-400"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"
                                        />
                                    </svg>

                                    <h2 className="ml-3 text-xl font-semibold text-red-500">
                                        <a href="#" onClick={sellsMenuHandler}>
                                            Ventas
                                        </a>
                                    </h2>
                                </div>

                                <p className="mt-4 text-gray-500 text-sm leading-relaxed">
                                    En este módulo podrá registrar las ventas
                                    realizadas, controlar la caja y generar
                                    reportes de ventas.
                                </p>
                            </div>
                            {/* buy - menu */}
                            <div>
                                <div className="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth="1.5"
                                        stroke="currentColor"
                                        className="w-6 h-6 stroke-gray-400"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                                        />
                                    </svg>

                                    <h2 className="ml-3 text-xl font-semibold text-red-500">
                                        <a href="#" onClick={buyMenuHandler}>
                                            Compras
                                        </a>
                                    </h2>
                                </div>

                                <p className="mt-4 text-gray-500 text-sm leading-relaxed">
                                    En este módulo podrá llevar registro de las
                                    compras realizadas.
                                </p>
                            </div>
                            {/* providers - menu */}
                            <div>
                                <div className="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth="1.5"
                                        stroke="currentColor"
                                        className="w-6 h-6 stroke-gray-400"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"
                                        />
                                    </svg>

                                    <h2 className="ml-3 text-xl font-semibold text-red-500">
                                        <a
                                            href="#"
                                            onClick={providersMenuHandler}
                                        >
                                            Proveedores
                                        </a>
                                    </h2>
                                </div>

                                <p className="mt-4 text-gray-500 text-sm leading-relaxed">
                                    En esta sección podrá gestionar y controlar
                                    datos de proveedores.
                                </p>
                            </div>
                            {/* book - menu */}
                            <div>
                                <div className="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth="1.5"
                                        stroke="currentColor"
                                        className="w-6 h-6 stroke-gray-400"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"
                                        />
                                    </svg>

                                    <h2 className="ml-3 text-xl font-semibold text-red-500">
                                        <a href="#" onClick={bookMenuHandler}>
                                            Caja
                                        </a>
                                    </h2>
                                </div>

                                <p className="mt-4 text-gray-500 text-sm leading-relaxed">
                                    En esta sección podrá controlar la caja,
                                    ingresos y egresos.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
