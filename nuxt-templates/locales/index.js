import { AttributeText } from "./_attributes"
import { DefaultText } from "./_default"
import { MessageText } from "./_message"
import { userScreen } from "./_user"
import { productScreen } from "./_product"
import { variantScreen } from "./_variant"

export const locale = {
    ...DefaultText.DEFAULT,
    ...userScreen.LABEL,
    ...productScreen.LABEL,
    ...variantScreen.LABEL,
    ...MessageText,
    ...{
        ATTRIBUTE: {
            ...AttributeText.ATTRIBUTE,
            ...userScreen.ATTRIBUTE,
            ...productScreen.ATTRIBUTE,
            ...variantScreen.ATTRIBUTE,
        }
    }
}