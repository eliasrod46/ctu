import "font-awesome/css/font-awesome.min.css";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import DangerButton from "@/Components/DangerButton";
import WarningButton from "@/Components/WarningButton";
import SecondaryButton from "@/Components/SecondaryButton";
import PrimaryButton from "@/Components/PrimaryButton";
import Modal from "@/Components/Modal";
import { Head, useForm } from "@inertiajs/react";
import { useRef, useState } from "react";
import InputLabel from "@/Components/InputLabel";
import TextInput from "@/Components/TextInput";
import SelectInput from "@/Components/SelectInput";
import Swal from "sweetalert2";
// import Swal from "sweetalert2";
// import InputError from "@/Components/InputError";
// import { Card, Typography } from "@material-tailwind/react";
// import axios from "axios";

const TABLE_HEAD = ["#", "DNI", "Apellido", "Nombre", "Correo", "Acciones"];

export default function SuppliersIndex({ auth, suppliers }) {
    const [modal, setModal] = useState(false);
    const [title, setTitle] = useState("");
    const [operation, setOperation] = useState("");
    const LastnameInput = useRef();
    const NameInput = useRef();
    const DniInput = useRef();
    const StateInput = useRef();
    const CbuInput = useRef();
    const AliasInput = useRef();
    const PhoneInput = useRef();
    const EmailInput = useRef();
    const {
        data,
        setData,
        delete: destroy,
        post,
        put,
        handleChange,
        processing,
        reset,
        errors,
    } = useForm({
        id: "",
        lastname: "",
        name: "",
        dni: "",
        state: "",
        cbu: "",
        alias: "",
        phone: "",
        email: "",
    });

    const openModal = (
        op,
        { id, lastname, name, dni, state, cbu, alias, phone, email }
    ) => {
        setModal(true);
        setOperation(op);
        setData({
            id: "",
            lastname: "",
            name: "",
            dni: "",
            state: "",
            cbu: "",
            alias: "",
            phone: "",
            email: "",
        });
        if (op === 1) {
            console.log("entre al 1");

            setTitle("Agregar Proveedor");
        } else {
            console.log("entre al else");

            setTitle("Editar Proveedor");
            setData({
                id: id,
                lastname: lastname,
                name: name,
                dni: dni,
                state: state,
                cbu: cbu,
                alias: alias,
                phone: phone,
                email: email,
            });
        }
    };

    const closeModal = () => {
        setModal(false);
    };

    const save = (e) => {
        e.preventDefault();
        if (operation === 1) {
            post(route("suppliers.store"), {
                onSuccess: () => {
                    ok("Proveedor Aregado");
                },
                OnError: () => {
                    if (errors.lastname) {
                        reset("lastname");
                        LastnameInput.current.focus();
                    }
                    if (errors.name) {
                        reset("name");
                        NameInput.current.focus();
                    }
                },
            });
        } else {
            put(route("suppliers.update", data.id), {
                onSuccess: () => {
                    ok("Proveedor Modificado");
                },
                OnError: () => {
                    if (errors.lastname) {
                        reset("lastname");
                        LastnameInput.current.focus();
                    }
                    if (errors.name) {
                        reset("name");
                        NameInput.current.focus();
                    }
                },
            });
        }
    };

    const ok = (message) => {
        reset();
        closeModal();
        Swal.fire({ title: message, icon: "success" });
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

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        {/* header */}
                        <div className="p-6 lg:p-8 bg-white border-b border-gray-200 flex flex-col items-center justify-center">
                            <h1 className="mt-8 text-2xl font-medium text-gray-900">
                                Gestión de{" "}
                                <span className="text-red-500">
                                    Proveedores
                                </span>
                            </h1>
                        </div>
                        {/* add supplier */}
                        <div className="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                            <SecondaryButton onClick={() => openModal(1, {})}>
                                <i className="fa fa-plus-circle pr-2"></i>{" "}
                                Añadir
                            </SecondaryButton>
                        </div>
                        {/* table supplier */}
                        <div className="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                            <table className="table-auto border border-gray-400">
                                <thead>
                                    <tr className="bg-gray-100">
                                        {TABLE_HEAD.map((headItem, i) => (
                                            <th className="px-2 py-2" key={i}>
                                                {headItem}
                                            </th>
                                        ))}
                                    </tr>
                                </thead>
                                <tbody>
                                    {suppliers.map((supplier, i) => (
                                        <tr
                                            className="px-2 py-2"
                                            key={supplier.id}
                                        >
                                            <td className="border border-gray-400 px-2 py-2">
                                                {i + 1}
                                            </td>
                                            <td className="border border-gray-400 px-2 py-2">
                                                {supplier.dni}
                                            </td>
                                            <td className="border border-gray-400 px-2 py-2">
                                                {supplier.lastname}
                                            </td>
                                            <td className="border border-gray-400 px-2 py-2">
                                                {supplier.name}
                                            </td>
                                            <td className="border border-gray-400 px-2 py-2">
                                                {supplier.email}
                                            </td>
                                            <td className="border border-gray-400 px-2 py-2">
                                                <WarningButton
                                                    onClick={() =>
                                                        openModal(2, supplier)
                                                    }
                                                >
                                                    <i className=" fa fa-edit"></i>
                                                </WarningButton>
                                                <DangerButton
                                                // onClick={
                                                //     confirmingSupplierDeletion
                                                // }
                                                >
                                                    <i className=" fa fa-trash"></i>
                                                </DangerButton>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <Modal show={modal} onClose={closeModal}>
                <h2 className="text-lg font-medium text-gray-900">{title}</h2>
                <form onSubmit={save} className="p-6">
                    <div className="mt-6 ">
                        <InputLabel htmlFor="lastname" value="Apellido" />
                        <TextInput
                            id="lastname"
                            name="lastname"
                            ref={LastnameInput}
                            value={data.lastname}
                            required="required"
                            onChange={(e) => {
                                setData(e.target.name, e.target.value);
                            }}
                            className="mt-1 block w-3/4"
                            isFocused
                        />
                        <InputLabel htmlFor="name" value="Nombre" />
                        <TextInput
                            id="name"
                            name="name"
                            ref={NameInput}
                            value={data.name}
                            required="required"
                            onChange={(e) => {
                                setData(e.target.name, e.target.value);
                            }}
                            className="mt-1 block w-3/4"
                            isFocused
                        />
                        <InputLabel htmlFor="dni" value="DNI" />
                        <TextInput
                            id="dni"
                            name="dni"
                            ref={DniInput}
                            value={data.dni}
                            required="required"
                            onChange={(e) => {
                                setData(e.target.name, e.target.value);
                            }}
                            className="mt-1 block w-3/4"
                            isFocused
                        />
                        <InputLabel htmlFor="state" value="Provincia" />
                        <SelectInput
                            id="state"
                            name="state"
                            ref={StateInput}
                            value={data.state}
                            required="required"
                            onChange={(e) => {
                                setData(e.target.name, e.target.value);
                            }}
                            className="mt-1 block w-3/4"
                            options={["opcion1", "opcion2", "opcion3"]}
                            isFocused
                        />
                        <InputLabel htmlFor="cbu" value="CBU" />
                        <TextInput
                            id="cbu"
                            name="cbu"
                            ref={CbuInput}
                            value={data.cbu}
                            required="required"
                            onChange={(e) => {
                                setData(e.target.name, e.target.value);
                            }}
                            className="mt-1 block w-3/4"
                            isFocused
                        />
                        <InputLabel htmlFor="alias" value="Alias" />
                        <TextInput
                            id="alias"
                            name="alias"
                            ref={AliasInput}
                            value={data.alias}
                            required="required"
                            onChange={(e) => {
                                setData(e.target.name, e.target.value);
                            }}
                            className="mt-1 block w-3/4"
                            isFocused
                        />
                        <InputLabel htmlFor="phone" value="Telefono" />
                        <TextInput
                            id="phone"
                            name="phone"
                            ref={PhoneInput}
                            value={data.phone}
                            required="required"
                            onChange={(e) => {
                                setData(e.target.name, e.target.value);
                            }}
                            className="mt-1 block w-3/4"
                            isFocused
                        />
                        <InputLabel htmlFor="email" value="Correo" />
                        <TextInput
                            id="email"
                            name="email"
                            ref={EmailInput}
                            value={data.email}
                            required="required"
                            onChange={(e) => {
                                setData(e.target.name, e.target.value);
                            }}
                            className="mt-1 block w-3/4"
                            isFocused
                        />
                    </div>
                    <div className="mt-6 "></div>

                    <div className="mt-6 flex items-center justify-around">
                        <PrimaryButton type="submit">
                            <i className="fa fa-save"></i>
                            Guardar
                        </PrimaryButton>
                        <DangerButton onClick={closeModal}>
                            Cancelar
                        </DangerButton>

                        {/* <DangerButton className="ms-3" disabled={processing}>
                            Eliminar Prveedor
                        </DangerButton> */}
                    </div>
                </form>
            </Modal>
        </AuthenticatedLayout>
    );
}
