import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import SuppliersLabel from "../../Components/SuppliersLabel";
import SuppliersInputs from "../../Components/SuppliersInput";

export default function SuppliersCreate({ auth }) {
    const { data, setData, post, processing, errors, transform } = useForm({
        lastname: "",
        name: "",
        dni: "",
        state: "",
        cbu: "",
        alias: "",
        phone: "",
        email: "",
    });

    const onSubmit = (e) => {
        e.preventDefault();

        post(route("suppliers.store"));
    };

    const handleChange = (e) => {
        if (e.target.type == "number") {
            setData(e.target.name, Number(e.target.value));
        } else {
            setData(e.target.name, e.target.value);
        }
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
                <form onSubmit={onSubmit}>
                    {/*{-- data --}*/}
                    <div className="grid grid-rows-1 gap-4">
                        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            {/*{-- lastname --}*/}
                            <div>
                                <SuppliersLabel label="Apellidos" />
                                {/*{-- input --}*/}
                                <input
                                    value={data.lastname}
                                    onChange={handleChange}
                                    required
                                    name="lastname"
                                    type="text"
                                    id="lastname"
                                    placeholder="Apellidos"
                                    className="block mt-1 w-full"
                                />
                                {errors.lastname && (
                                    <div className="text-red-500 text-sm">
                                        {errors.lastname}
                                    </div>
                                )}
                            </div>
                            {/*{-- name --}*/}
                            <div>
                                <SuppliersLabel label="Nombre" />
                                {/*{-- input --}*/}
                                <input
                                    value={data.name}
                                    onChange={handleChange}
                                    required
                                    name="name"
                                    type="text"
                                    id="name"
                                    placeholder="Nombre"
                                    className="block mt-1 w-full"
                                />
                                {errors.name && (
                                    <div className="text-red-500 text-sm">
                                        {errors.name}
                                    </div>
                                )}
                            </div>
                            {/*{-- dni --}*/}
                            <div>
                                <SuppliersLabel label="DNI" />
                                {/*{-- input --}*/}
                                <input
                                    value={data.dni}
                                    onChange={handleChange}
                                    required
                                    name="dni"
                                    type="number"
                                    id="dni"
                                    placeholder="DNI"
                                    className="block mt-1 w-full"
                                />
                                {errors.dni && (
                                    <div className="text-red-500 text-sm">
                                        {errors.dni}
                                    </div>
                                )}
                            </div>
                            {/*{-- state --}*/}
                            <div>
                                <SuppliersLabel label="Provincia" />
                                {/*{-- input --}*/}
                                <input
                                    value={data.state}
                                    onChange={handleChange}
                                    required
                                    name="state"
                                    type="text"
                                    id="state"
                                    placeholder="Provincia"
                                    className="block mt-1 w-full"
                                />
                                {errors.state && (
                                    <div className="text-red-500 text-sm">
                                        {errors.state}
                                    </div>
                                )}
                            </div>
                            {/*{-- cbu --}*/}
                            <div>
                                <SuppliersLabel label="CBU" />
                                {/*{-- input --}*/}
                                <input
                                    value={data.cbu}
                                    onChange={handleChange}
                                    required
                                    name="cbu"
                                    type="text"
                                    id="cbu"
                                    placeholder="CBU"
                                    className="block mt-1 w-full"
                                />
                                {errors.cbu && (
                                    <div className="text-red-500 text-sm">
                                        {errors.cbu}
                                    </div>
                                )}
                            </div>
                            {/*{-- alias --}*/}
                            <div>
                                <SuppliersLabel label="Alias" />
                                {/*{-- input --}*/}
                                <input
                                    value={data.alias}
                                    onChange={handleChange}
                                    required
                                    name="alias"
                                    type="text"
                                    id="alias"
                                    placeholder="Alias"
                                    className="block mt-1 w-full"
                                />
                                {errors.alias && (
                                    <div className="text-red-500 text-sm">
                                        {errors.alias}
                                    </div>
                                )}
                            </div>
                            {/*{-- phone --}*/}
                            <div>
                                <SuppliersLabel label="Telefono" />
                                {/*{-- input --}*/}
                                <input
                                    value={data.phone}
                                    onChange={handleChange}
                                    required
                                    name="phone"
                                    type="number"
                                    id="phone"
                                    placeholder="Telefono"
                                    className="block mt-1 w-full"
                                />
                                {errors.phone && (
                                    <div className="text-red-500 text-sm">
                                        {errors.phone}
                                    </div>
                                )}
                            </div>
                            {/*{-- email --}*/}
                            <div>
                                <SuppliersLabel label="Correo" />
                                {/*{-- input --}*/}
                                <input
                                    value={data.email}
                                    onChange={handleChange}
                                    required
                                    name="email"
                                    type="email"
                                    id="email"
                                    placeholder="Correo"
                                    className="block mt-1 w-full"
                                />
                                {errors.email && (
                                    <div className="text-red-500 text-sm">
                                        {errors.email}
                                    </div>
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

// {
//     /*{-- email --}*/
// }
// <div>
//     <SuppliersLabel label="Correo" />
//     {/*{-- input --}*/}
//     <input
//         placeholder="Correo"
//         className="block mt-1 w-full"
//         type="email"
//         id="email"
//         {...register("email", {
//             required: true,
//         })}
//     />
//     {/*{-- errors --}*/}
//     {errors.email && (
//         <span className="text-red-500 text-sm">This field is required</span>
//     )}
// </div>;
