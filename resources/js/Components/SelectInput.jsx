import { forwardRef, useEffect, useRef } from "react";

export default forwardRef(function SelectInput(
    { options = null, className = "", isFocused = false, ...props },
    ref
) {
    const input = ref ? ref : useRef();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
    }, []);

    return (
        <div className="flex flex-col items-start">
            <select
                {...props}
                className={
                    "border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm " +
                    className
                }
                ref={input}
            >
                <option value="value1">Selecciones una opcion</option>
                {options.map((option, i) => {
                    return (
                        <option value={option} key={i}>
                            {option}
                        </option>
                    );
                })}
            </select>
        </div>
    );
});
