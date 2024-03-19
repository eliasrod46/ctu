import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Card, Typography } from "@material-tailwind/react";
const TABLE_HEAD = [
    "Apellido",
    "Nombre",
    "DNI",
    "Provincia",
    "CBU",
    "Alias",
    "Telefono",
    "Correo",
    "Acciones",
];

import { Head, useForm } from "@inertiajs/react";
import { useEffect } from "react";
import { useState } from "react";

export default function SuppliersIndex({ auth, suppliers }) {
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
                <Card className="h-full w-full overflow-scroll">
                    <table className="w-full min-w-max table-auto text-left">
                        <thead>
                            <tr>
                                {TABLE_HEAD.map((head) => (
                                    <th
                                        key={head}
                                        className="border-b border-blue-gray-100 bg-blue-gray-50 p-4"
                                    >
                                        <Typography
                                            variant="small"
                                            color="blue-gray"
                                            className="font-normal leading-none opacity-70"
                                        >
                                            {head}
                                        </Typography>
                                    </th>
                                ))}
                            </tr>
                        </thead>
                        <tbody>
                            {suppliers.map((supplier, index) => {
                                const isLast = index === suppliers.length - 1;
                                const classes = isLast
                                    ? "p-4"
                                    : "p-4 border-b border-blue-gray-50";

                                return (
                                    <tr key={supplier.id}>
                                        <td className={classes}>
                                            <Typography
                                                variant="small"
                                                color="blue-gray"
                                                className="font-normal"
                                            >
                                                {supplier.lastname}
                                            </Typography>
                                        </td>
                                        <td className={classes}>
                                            <Typography
                                                variant="small"
                                                color="blue-gray"
                                                className="font-normal"
                                            >
                                                {supplier.name}
                                            </Typography>
                                        </td>
                                        <td className={classes}>
                                            <Typography
                                                variant="small"
                                                color="blue-gray"
                                                className="font-normal"
                                            >
                                                {supplier.dni}
                                            </Typography>
                                        </td>
                                        <td className={classes}>
                                            <Typography
                                                variant="small"
                                                color="blue-gray"
                                                className="font-normal"
                                            >
                                                {supplier.state}
                                            </Typography>
                                        </td>
                                        <td className={classes}>
                                            <Typography
                                                variant="small"
                                                color="blue-gray"
                                                className="font-normal"
                                            >
                                                {supplier.cbu}
                                            </Typography>
                                        </td>
                                        <td className={classes}>
                                            <Typography
                                                variant="small"
                                                color="blue-gray"
                                                className="font-normal"
                                            >
                                                {supplier.alias}
                                            </Typography>
                                        </td>
                                        <td className={classes}>
                                            <Typography
                                                variant="small"
                                                color="blue-gray"
                                                className="font-normal"
                                            >
                                                {supplier.phone}
                                            </Typography>
                                        </td>
                                        <td className={classes}>
                                            <Typography
                                                variant="small"
                                                color="blue-gray"
                                                className="font-normal"
                                            >
                                                {supplier.email}
                                            </Typography>
                                        </td>

                                        <td className={classes}>
                                            {/* 
                                                <Typography
                                                    // as="a"
                                                    // href="#"
                                                    // onClick={() => {
                                                        //     console.log("sera");
                                                    // }}
                                                    variant="small"
                                                    color="blue-gray"
                                                    className="font-medium"
                                                >
                                                </Typography>
                                            */}
                                            <div className="flex gap-4">
                                                <a
                                                    href="#"
                                                    onClick={() =>
                                                        console.log(supplier.id)
                                                    }
                                                >
                                                    eliminar
                                                </a>
                                                <a
                                                    href="#"
                                                    onClick={() =>
                                                        console.log(supplier.id)
                                                    }
                                                >
                                                    editar
                                                </a>
                                                <a
                                                    href="#"
                                                    onClick={() =>
                                                        console.log(supplier.id)
                                                    }
                                                >
                                                    ver
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                );
                            })}
                        </tbody>
                    </table>
                </Card>
            </div>
        </AuthenticatedLayout>
    );
}
