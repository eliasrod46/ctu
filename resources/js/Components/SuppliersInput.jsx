export default function SuppliersInputs({
    label,
    type,
    data,
    idValue,
    change,
}) {
    return (
        /*{-- dataInput --}*/
        <input
            className="block mt-1 w-full"
            placeholder={label}
            type={type}
            required
            name={idValue}
            id={idValue}
        />
    );
}
