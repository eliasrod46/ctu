import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head /*, useForm*/ } from "@inertiajs/react";
import { useForm } from "react-hook-form";
import SuppliersLabel from "../../Components/SuppliersLabel";

export default function SuppliersCreate({ auth }) {
    const {
        register,
        handleSubmit,
        watch,
        post,
        formState: { errors },
    } = useForm();

    const onSubmit = (e) => {
        post(route("suppliers.store"));
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Proveedores
                </h2>
            }
        >
            <Head title="Proveedores" />

            <div className="m-auto w-3/4">
                <form onSubmit={handleSubmit(onSubmit)}>
                    {/*{-- data --}*/}
                    <div className="grid grid-rows-1 gap-4">
                        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            {/*{-- lastname --}*/}
                            <div>
                                <SuppliersLabel label="Apellidos" />
                                {/*{-- input --}*/}
                                <input
                                    placeholder="Apellidos"
                                    className="block mt-1 w-full"
                                    type="text"
                                    id="lastname"
                                    {...register("lastname", {
                                        required: true,
                                    })}
                                />
                                {/*{-- errors --}*/}
                                {errors.lastname && (
                                    <span className="text-red-500 text-sm">
                                        This field is required
                                    </span>
                                )}
                            </div>
                            {/*{-- name --}*/}
                            <div>
                                <SuppliersLabel label="Nombre" />
                                {/*{-- input --}*/}
                                <input
                                    placeholder="Nombre"
                                    className="block mt-1 w-full"
                                    type="text"
                                    id="name"
                                    {...register("name", {
                                        required: true,
                                    })}
                                />
                                {/*{-- errors --}*/}
                                {errors.name && (
                                    <span className="text-red-500 text-sm">
                                        This field is required
                                    </span>
                                )}
                            </div>
                            {/*{-- dni --}*/}
                            <div>
                                <SuppliersLabel label="DNI" />
                                {/*{-- input --}*/}
                                <input
                                    placeholder="DNI"
                                    className="block mt-1 w-full"
                                    type="number"
                                    id="dni"
                                    {...register("dni", {
                                        required: true,
                                    })}
                                />
                                {/*{-- errors --}*/}
                                {errors.dni && (
                                    <span className="text-red-500 text-sm">
                                        This field is required
                                    </span>
                                )}
                            </div>
                            {/*{-- state --}*/}
                            <div>
                                <SuppliersLabel label="Provincia" />
                                {/*{-- input --}*/}
                                <input
                                    placeholder="Provincia"
                                    className="block mt-1 w-full"
                                    type="text"
                                    id="state"
                                    {...register("state", {
                                        required: true,
                                    })}
                                />
                                {/*{-- errors --}*/}
                                {errors.state && (
                                    <span className="text-red-500 text-sm">
                                        This field is required
                                    </span>
                                )}
                            </div>
                            {/*{-- cbu --}*/}
                            <div>
                                <SuppliersLabel label="CBU" />
                                {/*{-- input --}*/}
                                <input
                                    placeholder="CBU"
                                    className="block mt-1 w-full"
                                    type="number"
                                    id="cbu"
                                    {...register("cbu", {
                                        required: true,
                                    })}
                                />
                                {/*{-- errors --}*/}
                                {errors.cbu && (
                                    <span className="text-red-500 text-sm">
                                        This field is required
                                    </span>
                                )}
                            </div>
                            {/*{-- alias --}*/}
                            <div>
                                <SuppliersLabel label="Alias" />
                                {/*{-- input --}*/}
                                <input
                                    placeholder="Alias"
                                    className="block mt-1 w-full"
                                    type="text"
                                    id="alias"
                                    {...register("alias", {
                                        required: true,
                                    })}
                                />
                                {/*{-- errors --}*/}
                                {errors.alias && (
                                    <span className="text-red-500 text-sm">
                                        This field is required
                                    </span>
                                )}
                            </div>
                            {/*{-- phone --}*/}
                            <div>
                                <SuppliersLabel label="Telefono" />
                                {/*{-- input --}*/}
                                <input
                                    placeholder="Telefono"
                                    className="block mt-1 w-full"
                                    type="number"
                                    id="phone"
                                    {...register("phone", {
                                        required: true,
                                    })}
                                />
                                {/*{-- errors --}*/}
                                {errors.phone && (
                                    <span className="text-red-500 text-sm">
                                        This field is required
                                    </span>
                                )}
                            </div>
                            {/*{-- email --}*/}
                            <div>
                                <SuppliersLabel label="Correo" />
                                {/*{-- input --}*/}
                                <input
                                    placeholder="Correo"
                                    className="block mt-1 w-full"
                                    type="email"
                                    id="email"
                                    {...register("email", {
                                        required: true,
                                    })}
                                />
                                {/*{-- errors --}*/}
                                {errors.email && (
                                    <span className="text-red-500 text-sm">
                                        This field is required
                                    </span>
                                )}
                            </div>
                        </div>
                    </div>
                    {/*{-- submit --}*/}
                    <div className="flex justify-center mt-8 mb-8">
                        <button
                            className="p-1 px-3 rounded-full text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium"
                            type="submit"
                        >
                            Agregar
                        </button>
                    </div>
                </form>
            </div>
        </AuthenticatedLayout>
    );
}
